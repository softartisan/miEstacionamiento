<?php

namespace App\Http\Controllers;

use App\Estacionamiento;
use Illuminate\Http\Request;



use Freshwork\Transbank\CertificationBagFactory;
use Freshwork\Transbank\TransbankServiceFactory;
use Freshwork\Transbank\RedirectorHelper;
include 'Z:\Users\Cheche\Documents\GitHub\MiEstacionamiento\vendor\autoload.php';

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
        $bag = CertificationBagFactory::integrationWebpayNormal();
        $webpay = TransbankServiceFactory::normal($bag);

        $webpay->addTransactionDetail(10000, 'Orden824201'); // Monto e identificador de la orden
        // Debes además, registrar las URLs a las cuales volverá el cliente durante y después del flujo de Webpay
        $response = $webpay->initTransaction('http://127.0.0.1:8000/response.php', 'http://127.0.0.1:8000/thanks');
        // Utilidad para generar formulario y realizar redirección POST
        echo RedirectorHelper::redirectHTML($response->url, $response->token);
      //  print_r($response);
    }
}
