@extends('layouts.app')

@section('content')


<div class="container">
    <table class="table table-striped">
        <thead class="bg-dark text-white">
          <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Email</th>
            <th scope="col">Habilitado</th>
            <th scope="col">Editar</th>
            <th scope="col">Eliminar</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($clientes as $cliente)
        <tr>
            <td>{{$cliente->nombre_usuario}}</td>
            <td>{{$cliente->apellido_usuario}}</td>
            <td>{{$cliente->email_usuario}}</td>
            <td>{{$cliente->isenabled_usuario ? 'Sí' : 'No'}}</td>
            <td><a class="btn btn-primary" href="/crud/{{$cliente->id}}/edit"><i class="fas fa-edit"></i></a></td>
            <td>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$cliente->id}}">
                    <i class="fas fa-trash-alt"></i></a>
            </button>
      
      <!-- Modal -->
      <div class="modal fade" id="exampleModal{{$cliente->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Adventencia</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                
              ¿Esta seguro que desea eliminar al Cliente "{{$cliente->nombre_usuario}} {{$cliente->apellido_usuario}}" ?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">No, mantener</button>
              <a class="btn btn-danger" href="/crud/{{$cliente->id}}/delete">Sí, eliminar</a>
            </div>
          </div>
        </div>
      </div>
            </td>
        </tr>
        @endforeach
        </tbody>
      </table>
</div>


@endsection