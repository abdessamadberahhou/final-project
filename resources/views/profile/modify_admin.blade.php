@extends('layouts.app')

@section('section-1')
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-lg-9 col-xl-7">
                    <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                        <div class="card-body p-4 p-md-5 shadow text-center">
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Modifier un admin</h3>
                            {!! Form::open(['action'=>['\App\Http\Controllers\profileController@updateAdmin',$admin->id],'method'=>'POST']) !!}

                            <div class="row">
                                <div class="col-md-12 mb-4">

                                    <div class="form-outline">
                                        <label class="form-label" for="nom">Nom complet</label>
                                        <input type="text" id="nom" class="form-control form-control-lg" name="nom" value="{{$admin->name}}">
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4 d-flex align-items-center">

                                    <div class="form-outline datepicker w-100">
                                        <label for="date_nais" class="form-label" >Date de naissance</label>
                                        <input
                                            type="date"
                                            class="form-control form-control-lg"
                                            id="date_nais"
                                            name="date_nais"
                                            value="{{$admin->date_naissance}}">
                                    </div>

                                </div>
                                <div class="col-md-6 mb-4">

                                    <h6 class="mb-2 pb-1">Sexe </h6>

                                    <div class="form-check form-check-inline">
                                        <input
                                            class="form-check-input"
                                            type="radio"
                                            name="genre"
                                            id="femaleGender"
                                            value="Femme"
                                            checked
                                        />
                                        <label class="form-check-label" for="femaleGender">Femme</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input
                                            class="form-check-input"
                                            type="radio"
                                            name="genre"
                                            id="maleGender"
                                            value="Homme"
                                        />
                                        <label class="form-check-label" for="maleGender">Homme</label>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4 pb-2">

                                        <div class="form-outline">
                                            <label class="form-label" for="email">Email</label>
                                            <input type="email" id="email" name="email" class="form-control form-control-lg"  value="{{$admin->email}}">
                                        </div>

                                    </div>
                                    <div class="col-md-6 mb-4 pb-2">

                                        <div class="form-outline">
                                            <label class="form-label" for="num_tele">Num Tele</label>
                                            <input type="tel" id="num_tele" name="num_tele" class="form-control form-control-lg" value="{{$admin->phone}}">
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4 pb-2">

                                        <div class="form-outline">
                                            <label class="form-label" for="CIN">CIN</label>
                                            <input type="text" id="CIN" name="CIN" class="form-control form-control-lg" value="{{$admin->CIN}}"/>
                                        </div>

                                    </div>
                                    <div class="col-md-6 mb-4 pb-2">

                                        <div class="form-outline">
                                            <label class="form-label" for="confirm_pass">Mot de passe</label>
                                            <input type="password" id="confirm_pass" name="password" class="form-control form-control-lg" />
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-4 pb-2">

                                        <div class="form-outline">
                                            <label class="form-label" for="confirm_pass">Confirmer mot de passe</label>
                                            <input type="password" id="confirm_pass" name="password_confirmation" class="form-control form-control-lg" />
                                        </div>

                                    </div>
                                </div>

                                <div class="mt-4 pt-2 text-center">
                                    <button class="btn border-success text-success btn-edit" type="submit">Modifier</button>
                                    <a href=".." class="btn border-secondary text-secondary print-btn">Retour</a>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

@endsection
