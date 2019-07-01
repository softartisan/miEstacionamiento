@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifique su correo electrónico') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Un enlace de validación ha sido enviado a su correo electrónico.') }}
                        </div>
                    @endif

                    {{ __('Antes de proceder, porfavor verifique el enlace que ha sido enviado a su correo.') }}
                    {{ __('Si no ha recibido el correo,) }}, <a href="{{ route('verification.resend') }}">{{ __('haga click aquí para reenviar el correo.') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
