@extends('layouts.app')


@section('section-1')
    <div class="profile_info container shadow mt-5">
        {!! Form::open(['action'=>['\App\Http\Controllers\profileController@update',$current_user->id],'method'=>'post','enctype'=>'multipart/form-data']) !!}
        <div class="row  text-start pb-3">
            <div class="profile-img mt-4 col-lg-4 align-items-center text-center">
                <div class="photo">
                    <img src="{{asset('/images/'.$current_user->profile_path)}}" alt="" class="m-4 me-5">
                    <div class="upload-photo my-3 me-4">
                        <input type="file" name="profile_picture" id="profile_picture" class="input-control" accept="image/*" onchange="readURL(this);">
                        <label for="profile_picture" class="upload_image_label">Changer pdp</label>
                    </div>

                    <ul class="ul_photo me-3">
                        <li class="profile_change d-flex align-items-center justify-content-around"><a class="" href="/profile/edit">Modifier le profile</a></li>
                        <li class="profile_change d-flex align-items-center justify-content-around"><a class="" href="/profile/change_password">Modifier Mot de pass</a></li>
                        <li class="profile_change d-flex align-items-center justify-content-around"><a class="" href="/profile/admins">les admins</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-8 mt-4">
                <div class="m-4 text-sm-center text-lg-start">
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" class="form-control" name="nom" value="{{$current_user->name}}" >
                        </div>
                        <div class="col-lg-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" value="{{$current_user->email}}">
                        </div>
                    </div>
                    <div class="row mt-lg-5">
                        <div class="col-lg-6">
                            <label for="date_nai" class="form-label">Date de Naissance</label>
                            <input type="date" class="form-control" name="date_nai" value="{{$current_user->date_naissance}}">
                        </div>
                        <div class="col-lg-6">
                            <label for="CIN" class="form-label">CIN</label>
                            <input type="text" class="form-control" name="CIN" value="{{$current_user->CIN}}" >
                        </div>
                    </div>
                    <div class="row mt-lg-5">
                        <div class="col-lg-6">
                            <label for="phone" class="form-label">Numero de telephone</label>
                            <input type="tel" class="form-control" name="phone" value="{{$current_user->phone}}" >
                        </div>
                    </div>
                    <div class="row mt-5 text-center">
    {!! Form::hidden('_method','PUT') !!}
                        <div class="col-lg-6 mx-auto">
                            <button class="btn border-success text-success">Modifier</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    {!! Form::close() !!}
    </div>
    <script>

    </script>
@endsection
@section('extra-js')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#profile_picture').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
