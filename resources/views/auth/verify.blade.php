@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Vérification de l'addresse e-mail</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
{{--                            {{ __('A fresh verification link has been sent to your email address.') }}--}}
                            Un lien de vérification a été envoyé sur votre addresse e-mail.
                        </div>
                    @endif

{{--                    {{ __('Before proceeding, please check your email for a verification link.') }}--}}
                        Avant de continuer, Veuillez vérifier votre addresse e-mail pour un lien de vérification. Si vous n'avez pas reçus l'e-mail <a href="{{ route('verification.resend') }}">Veuillez cliquer ici pour renvoyer l'e-mail</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
