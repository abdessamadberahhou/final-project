{{--Cette page concerne la recherche dans les ameliorations--}}
@extends('layouts.app')


@section('section-1')

@endsection
@section('section-2')
    <div class="p-5 shadow container mt-5">
        <table class="table">
            <tr>
                {!! Form::open(['action'=>'\App\Http\Controllers\ameliorationController@search', 'method'=>'post']) !!}
                <th class="col-1">
                    <input type="text" class="form-control" placeholder="Id" name="id_amel">
                </th>
                <th class="col-2">
                    <select name="type_amel" id="" class="form-select">
                        <option value="">Tout</option>
                        @foreach($type_amel as $type)
                            <option value="{{$type->type_amel}}">{{$type->type_amel}}</option>
                        @endforeach
                    </select>
                </th>
                <th>
                    <select name="batiment" id="" class="form-select">
                        <option value="">Tout</option>
                        @foreach($batiment as $bat)
                            <option value="{{$bat->nom_bat}}">{{$bat->nom_bat}}</option>
                        @endforeach
                    </select>
                </th>
                <th class="col-2">

                </th>
                <th></th>
                <th></th>
                <th><button class="btn border-primary text-primary" type="submit">Rechercher</button></th>
                {!! Form::close() !!}
            </tr>
            <tr>
                <th>Id</th>
                <th>Type Amelioration</th>
                <th>Batiment</th>
                <th>Date d'amelioration</th>
                <th>Montant</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
            @if(count($amelioration)>0)
                @foreach($amelioration as $amel)
                    <tr>
                        <td>{{$amel->id_amel}}</td>
                        <td>{{$amel->type_amel}}</td>
                        <td>{{$amel->batiment_amel}}</td>
                        <td>{{$amel->date_amel}}</td>
                        <td>{{$amel->montant_amel}}</td>
                        <td>{{$amel->description_amel}}</td>
                        <td>
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
