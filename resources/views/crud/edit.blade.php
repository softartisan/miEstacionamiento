@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <div class="card-header">Editando Cliente: {{$cliente->nombre_usuario}} {{$cliente->apellido_usuario}}</div>

              <div class="card-body">
              <form method="POST" action="/crud/{{ $cliente->id }}">
                @method('PATCH')
                @csrf
                      <div class="form-group row">
                          <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                          <div class="col-md-6">
                          <input id="nombre" type="text"  class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') ?? $cliente->nombre_usuario }}">

                              @error('nombre')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="apellido" class="col-md-4 col-form-label text-md-right">{{ __('Apellido') }}</label>

                          <div class="col-md-6">
                              <input id="apellido" type="text" class="form-control @error('apellido') is-invalid @enderror" name="apellido" value="{{ old('apellido') ?? $cliente->apellido_usuario }}">

                              @error('apellido')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="telefono" class="col-md-4 col-form-label text-md-right">{{ __('Telefono') }}</label>

                          <div class="col-md-6">
                              <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') ?? $cliente->telefono_usuario }}">

                              @error('telefono')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                          <div class="col-md-6">
                              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">

                              @error('password')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Contraseña') }}</label>

                          <div class="col-md-6">
                              <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                          </div>
                      </div>

                      <div class="form-group row mb-0">
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                              Editar
                              </button>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
</div>

@endsection