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
                        <li class="profile_change d-flex align-items-center justify-content-around"><a class="" href="/profile/admins">les admins</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-8 mt-4">
                <div class="m-4 text-sm-center text-lg-start">
                        <div class="col text-center mb-3">
                            <a href="/profile/admins/add" class="btn border-primary text-primary btn-add">Ajouter</a>
                        </div>
                    <table class="table">
                        <tr>
                            <th>Id</th>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>CIN</th>
                            <th>Num tele</th>
                            <th>Sexe</th>
                            <th>Action</th>
                        </tr>
                        @foreach($users as $user)
                            @if($user->name == 'admin')
                            <tr disabled>
                            @else
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->CIN}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td>{{$user->genre}}</td>
                                    <td class="text-nowrap align-items-center justify-content-center">
                                        <a  class="btn btn-edit border-success text-success" href="/profile/admins/modify/{{$user->id}}"><i class="bi bi-pencil-square"></i></a>
                                        <a href="#" data-id="{{$user->id}}" class="deletebtn btn btn-delete border-danger text-danger"><i class="bi bi-trash3"></i></a>
                                    </td>
                            </tr>
                            @endif
                        @endforeach
                    </table>
            </div>
        </div>

    </div>
        <script>
            $('.deletebtn').click(function (){
                var id = $(this).attr('data-id');
                swal({
                    title: "voulez vous vraiment supprimer ce admin",
                    text: "",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            window.location = "/profile/admins/delete/"+id;
                        }
                    });
            });

        </script>
@endsection
