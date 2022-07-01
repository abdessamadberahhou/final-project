@extends('layouts.app')


@section('section-1')
    <div class="profile_info container shadow mt-5">
                <div class="row  text-start pb-3">
                    <div class="profile-img mt-4 col-lg-4 align-items-center text-center">
                            <div class="photo">
                                <img src="{{asset('/images/'.$current_user->profile_path)}}" alt="" class="m-4 me-5">
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
                        <div class="m-4 text-sm-center text-lg-start">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="nom" class="form-label">Nom</label>
                                    <input type="text" class="form-control" name="nom" value="{{$current_user->name}}" disabled>
                                </div>
                                <div class="col-lg-6">
                                    <label for="nom" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" value="{{$current_user->email}}" disabled>
                                </div>
                            </div>
                            <div class="row mt-lg-5">
                                <div class="col-lg-6">
                                    <label for="nom" class="form-label">Date de Naissance</label>
                                    <input type="text" class="form-control" name="date_nai" value="{{$current_user->date_naissance}}" disabled>
                                </div>
                                <div class="col-lg-6">
                                    <label for="CIN" class="form-label">CIN</label>
                                    <input type="text" class="form-control" name="CIN" value="{{$current_user->CIN}}" disabled>
                                </div>
                            </div>
                            <div class="row mt-lg-5">
                                <div class="col-lg-6">
                                    <label for="phone" class="form-label">Numero de telephone</label>
                                    <input type="tel" class="form-control" name="phone" value="{{$current_user->phone}}" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

    </div>
@endsection

