@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-6">
            <div class="card mt-5 shadow" >
                <div class="card-header text-center align-items-center"><h2><b>{{ __('Register') }}</b></h2></div>

                <div class="card-body w-100 text-center">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class=" mb-3">
                            <label for="name" class="col-md-4 col-form-label">{{ __('Name') }} </label>

                            <div class="col-md-10 mx-auto">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class=" mb-3">
                            <label for="email" class="col-md-4 col-form-label">{{ __('Email Address') }}</label>

                            <div class="col-md-10 mx-auto">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class=" mb-3">
                            <label for="name" class="col-md-4 col-form-label">Date Naissance</label>
                            <div class="col-md-10 mx-auto">
                                <input id="date_nai" name="date_nai" type="date" class="form-control" value="<?php echo date('Y-m-d') ?>">

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class=" mb-3">
                            <label for="password" class="col-md-4 col-form-label">{{ __('Password') }}</label>

                            <div class="col-md-10 mx-auto">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class=" mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label">{{ __('Confirm Password') }}</label>

                            <div class="col-md-10 mx-auto">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class=" mb-3">
                            <label for="name" class="col-md-4 col-form-label">Genre</label>

                            <div class="col-md-10 mx-auto">
                                <div class="form-gender d-flex justify-content-evenly">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="Homme" id="Homme" name="genre">
                                        <label class="form-check-label" for="Homme">
                                            Homme
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="Femme" id="Femme" name="genre">
                                        <label class="form-check-label" for="Femme">
                                            Femme
                                        </label>
                                    </div>
                                </div>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class=" mb-0 text-center">
                            <div class="col-md-10  mx-auto">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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
