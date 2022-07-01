{{--Cette page concerne la page de tout les batiements--}}
@extends('layouts.app')
@section('section-1')
@endsection
@section('section-2')
    <div class="container shadow mt-5">
        <table class="table ">
            {!! Form::open(['action' => '\App\Http\Controllers\batimentController@search', 'method'=>'GET']) !!}
            <tr>
                <th class="col-lg-1">
                    <input type="text" class="form-control text-center filter-input" name="id"
                           placeholder="id" data-column="0">
                </th>
                <th class="col-lg-2">
                    <input type="text" class="form-control text-center filter-input" name="nb_apt"
                           placeholder="nb apt" data-column="1">
                </th>
                <th class="col-lg-2">
                    <input type="text" class="form-control text-center filter-input" name="adresse"
                           placeholder="adresse" data-column="2">
                </th>
                <th>

                </th>
                <th>

                </th>
                <th class="col-lg-2">
                    <input type="text" class="form-control text-center filter-input" name="femme_men"
                           placeholder="femme de menage" data-column="2">
                </th>
                <th >

                </th>
                <th>

                </th>
                <th class="text-center">
                    <button type="submit" class="btn border-success text-success btn-edit">Rechercher</button>
                    <a href="/batiment/create"><button class="btn border-primary text-primary btn-add">Ajouter</button></a>
                </th>

            </tr>
            {!! Form::close() !!}
            <tr class="text-center">
                <th>id</th>
                <th>nb apt</th>
                <th>adresse</th>
                <th>nb hab</th>
                <th>date Cons</th>
                <th>femme menage</th>
                <th>nom bat</th>
                <th>nb apt habité</th>
                <th class="text-center">Action</th>
            </tr>

            @if(count($batiment)>0)
                @foreach($batiment as $bat)
                    <tr class="text-center">
                        <td>{{$bat->id}}</td>
                        <td>{{$bat->nb_apt}}</td>
                        <td>{{$bat->adresse}}</td>
                        <td>{{$bat->nb_hab}}</td>
                        <td>{{$bat->date_cons}}</td>
                        <td>{{$bat->femme_men}}</td>
                        <td>{{$bat->nom_bat}}</td>
                        <td>{{$bat->nb_apt_habite}}</td>
                        <td class="text-center">
                            <a href="/batiment/{{$bat->id}}"><button class="btn border-primary text-primary btn-consult"><i class="bi bi-eye"></i></button></a>
                            <a href="/batiment/{{$bat->id}}/edit"><button class="btn border-success text-success btn-edit"><i class="bi bi-pencil-square"></i></button></a>
                            <a href="#" data-id="{{$bat->id}}" class="deletebtn"><button class="btn border-danger text-danger btn-delete"><i class="bi bi-trash3"></i></button></a>
                        </td>

                    </tr>
                @endforeach
        </table>
        @else
            <h4>Aucun Resultat</h4>
        @endif

    </div>
        <script src="{{asset('js/jquery.js')}}"></script>
        <script>
        $('.deletebtn').click(function (){
            var id = $(this).attr('data-id');
            swal({
                title: "voulez vou vraiment supprimer "+id,
                text: "",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "/batiment/delete/"+id;
                    }
                });
        });

    </script>
@endsection
