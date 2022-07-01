@extends('layouts.app')

@section('section-1')
    <div class="profile_info container shadow mt-5">
        <div class="row  text-start pb-3">
            <div class="profile-img mt-4 col-lg-4 align-items-center text-center">
                <div class="photo">
                    <img src="{{asset('/images/'.Auth::user()->profile_path)}}" alt="" class="m-4 me-5">
                    <ul class="ul_photo me-3">
                        <li class="profile_change d-flex align-items-center justify-content-around"><a class="" href="/profile/edit">Modifier le profile</a></li>
                        <li class="profile_change d-flex align-items-center justify-content-around"><a class="" href="/profile/change_password">Modifier Mot de pass</a></li>
                        @if(Auth::user()->role_as == 1)
                            <li class="profile_change d-flex align-items-center justify-content-around"><a class="" href="/profile/admins">les admins</a></li>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="col-lg-8 mt-4">
                {!! Form::open(['action'=>'\App\Http\Controllers\profileController@updatePass','method'=>'post', 'id'=>'change_password_form']) !!}
                    <div class="m-4 text-sm-center text-lg-start mx-auto d-flex ">
                        <div class="all col-lg-8 mx-auto text-center">
                            <div class="row">
                                <div class="col-lg-12">
                                    <label for="old_pass" class="form-label">Ancien mot de passe</label>
                                    <input type="password" class="form-control" name="old_pass"  id="old_pass">
                                </div>
                            </div>
                            <div class="row mt-lg-5">
                                <div class="col-lg-12">
                                    <label for="new_pass" class="form-label">Nouveau mot de passe</label>
                                    <input type="password" class="form-control" name="new_pass" id="new_pass">
                                </div>
                            </div>
                            <div class="row mt-lg-5">
                                <div class="col-lg-12">
                                    <label for="new_pass_confirmation" class="form-label">Confirmer votre mot de passe</label>
                                    <input type="password" class="form-control" name="new_pass_confirmation" id="new_pass_confirmation">
                                </div>
                            </div>
                            <div class="row mt-lg-5">
                                <div class="col-lg-12">
                                    <button class="btn border-success text-success" type="sumit" name="submit">Modifier</button>
                                </div>
                            </div>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>

    </div>
@endsection
