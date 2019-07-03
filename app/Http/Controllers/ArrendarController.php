<?php
namespace App\Http\Controllers;
session_start();

use Freshwork\Transbank\CertificationBagFactory;
use Freshwork\Transbank\TransbankServiceFactory;
use Freshwork\Transbank\RedirectorHelper;
use \vendor\autoload;
use App\Estacionamiento;
use Illuminate\Http\Request;

// include 'Z:\Users\Cheche\Documents\GitHub\MiEstacionamiento\vendor\autoload.php';


class ArrendarController extends Controller
{
    public function __construct () {
        $this->middleware('auth');
        $this->middleware('role:cliente');
    }

    public function arrendar() {
        return view( 'arrendar.arrendar');
    }

    public function busqueda(){
        $estacionamientos = Estacionamiento::all();
        return view( 'arrendar.busqueda',compact('estacionamientos'));
    }

    public function show(Estacionamiento $estacionamiento){
        return view('arrendar.show', compact('estacionamiento'));
    }

    public function venta(Estacionamiento $estacionamiento)
    {
        $data = request()->validate([
        'cantidad' => ['required', 'numeric', 'min:1','max:24']
        ]);

        $valorAPagar = $data['cantidad']*$estacionamiento->precio_hora;

        $bag = CertificationBagFactory::integrationWebpayNormal();
        $webpay = TransbankServiceFactory::normal($bag);
        $webpay->addTransactionDetail($valorAPagar, rand(1,99999)); // Monto e identificador de la orden
        $_SESSION['orden'] = $estacionamiento->id;
        $_SESSION['total'] = $valorAPagar;
        // Debes además, registrar las URLs a las cuales volverá el cliente durante y después del flujo de Webpay
        $response = $webpay->initTransaction(url('/transaccion'), url('/finalizada'));
        // Utilidad para generar formulario y realizar redirección POST
        echo RedirectorHelper::redirectHTML($response->url, $response->token);
      //  print_r($response);
    }

    // /transaccion ocupa este metodo y retorna un voucher en WebPay
    public function webpayPayment()
    {
        $bag = CertificationBagFactory::integrationWebpayNormal();
        $webpay = TransbankServiceFactory::normal($bag);
        $response = $webpay->getTransactionResult();
        $_SESSION['responseCode'] = $response->detailOutput->responseCode;
        $webpay->acknowledgeTransaction();
        return RedirectorHelper::redirectBackNormal($response->urlRedirection);
    }

    public  function finish()
    {
        //Acá tienes que poner el IF si es rechazada o si se realiza la compra
        if($_SESSION['responseCode'] == '0'){
            $idEstacionamiento = $_SESSION['orden'];
            $estacionamiento = Estacionamiento::find($idEstacionamiento);

            $estacionamiento->islibre = 1;
            $estacionamiento->save();

            $total = $_SESSION['total'];

            return view( 'arrendar.success', compact('estacionamiento'));
        }else {
            return view( 'arrendar.fail');
        }
    }
}
