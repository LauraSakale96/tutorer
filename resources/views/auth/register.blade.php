@extends('layouts.app')

@section('content')
<div class="container">
    <style>
    html,body{
        background: #F0EAB8
    }
    </style>
    
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Autorizācija') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Vārds') }}</label>

                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Uzvārds') }}</label>

                            <div class="col-md-8">
                                <input id="lastname" type="text" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname" value="{{ old('lastname') }}" required>

                                
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="subject" class="col-md-4 col-form-label text-md-right">{{ __('Priekšmets/-i, ko pasniedzat') }}</label>

                            <div class="col-md-8">
                                <input id="subject" type="text" class="form-control{{ $errors->has('subject') ? ' is-invalid' : '' }}" name="subject" value="{{ old('subject') }}" required autofocus>

                                @if ($errors->has('subject'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('subject') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="education" class="col-md-4 col-form-label text-md-right">{{ __('Jūsu izglītība') }}</label>

                            <div class="col-md-8">
                                <input id="education" type="text" class="form-control{{ $errors->has('education') ? ' is-invalid' : '' }}" name="education" value="{{ old('education') }}" required autofocus>

                                @if ($errors->has('education'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('education') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Pasta Adrese') }}</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Parole') }}</label>

                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Apstipriniet Paroli') }}</label>

                            <div class="col-md-8">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Autorizēt') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <br>
                    <div class="alert alert-info">
                        <strong>Ievērojiet!</strong> Autorizējoties Jūs piekrītat, ka Jūsu sniegtā informācija tiek glabāta sistēmas datubāzē, taču tā tiks izmantota tika, lai ļautu Jums piekļūt visām rakstīšanas, lasīšanas, rediģēšanas un dzēšanas funkcijām. Sniegtā informācija netiks nodota trešajām partijām vai izmantota ārpus šīs sistēmas.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection