{{--Cette page concerne la page principale d'amelioration--}}
@extends('layouts.app')
@section('section-2')
    <div class="shadow container mt-5 p-2">
        <table class="table">
            <tr>
{{--Le debut de filtre--}}
                {!! Form::open(['action'=>'\App\Http\Controllers\ameliorationController@search', 'method'=>'GET']) !!}
                    <th class="col-1 ">
                        <input type="text" class="form-control" placeholder="Id" name="id_amel">
                    </th>
                    <th class="col-2 ">
                        <select name="type_amel" id="" class="form-select">
                            <option value="">Tout</option>
                            @foreach($type_amel as $type)
                                <option value="{{$type->type_amel}}">{{$type->type_amel}}</option>
                            @endforeach
                        </select>
                    </th>
                    <th class="text-center">
                        <select name="batiment" id="" class="form-select">
                            <option value="">Tout</option>
                            @foreach($batiment as $bat)
                                <option value="{{$bat->nom_bat}}">{{$bat->nom_bat}}</option>
                            @endforeach
                        </select>
                    </th>
                    <th class="col-2">
                        <input type="date" class="form-control" name="date_amel" value="<?php echo date('Y-m-d') ?>">
                    </th>
                    <th class="text-center"></th>
                    <th class="text-center"></th>
                    <th class="text-center">
                        <button class="btn border-success text-success btn-edit" type="submit">Rechercher</button>
                        <a href="/amelioration/create" class="btn border-primary text-primary btn-add">Ajouter</a>
                    </th>
                {!! Form::close() !!}
{{--La fin de filtre--}}
            </tr>
            <tr>
                <th class="text-center">Id</th>
                <th class="text-center">Type Amélioration</th>
                <th class="text-center">Batiment</th>
                <th class="text-center">Date d'amélioration</th>
                <th class="text-center">Montant</th>
                <th class="text-center">Description</th>
                <th class="text-center">Action</th>
            </tr>
            @if(count($amelioration)>0)
                @foreach($amelioration as $amel)
                    <tr>
                        <td class="text-center">{{$amel->id_amel}}</td>
                        <td class="text-center">{{$amel->type_amel}}</td>
                        <td class="text-center">{{$amel->batiment_amel}}</td>
                        <td class="text-center">{{$amel->date_amel}}</td>
                        <td class="text-center">{{$amel->montant_amel}}</td>
                        <td class="text-center">{{$amel->description_amel}}</td>
                        <td class="text-center">
                            <a href="/amelioration/{{$amel->id_amel}}" class="btn btn-consult border-primary text-primary"><i class="bi bi-eye"></i></a>
                            <a href="/amelioration/{{$amel->id_amel}}/edit" class="btn btn-edit border-success text-success"><i class="bi bi-pencil-square"></i></a>
                            <a class="btn-delete deletebtn btn border-danger text-danger" data-id="{{$amel->id_amel}}" href="#"><i class="bi bi-trash3"></i></a>
                        </td>
                    </tr>
                @endforeach
                @else
        </table>
        <div class="no-records text-center ">
            <p><b>Aucun resultat</b></p>
        </div>
        @endif
    </div>
    <script src="{{asset('js/jquery.js')}}"></script>
    <script>
        $('.deletebtn').click(function (){
            var id = $(this).attr('data-id');
            swal({
                title: "voulez vou vraiment supprimer cette amelioration",
                text: "",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "/amelioration/delete/"+id;
                    }
                });
        });
    </script>
@endsection
