@extends('layouts.app')

@section('section-2')
    <div class="container shadow mt-5">
        <table class="table">
            {!! Form::open(['action' => '\App\Http\Controllers\operatorController@search', 'method'=>'GET']) !!}
            <tr>
                <th class="col-lg-1">
                    <input type="text" class="form-control text-center filter-input" name="id"
                           placeholder="id" data-column="0">
                </th>
                <th>

                </th>
                <th class="col-lg-2">
                    <input type="text" class="form-control text-center filter-input" name="nom_ope"
                           placeholder="nom ope" data-column="2">
                </th>
                <th>

                </th>
                <th>

                </th>
                <th>

                </th>
                <th>

                </th>
                <th class="col-lg-1">
                    <select name="type_ope" id="" class="form-select">
                        <option value="">Tous</option>
                        @foreach($type_ope as $type)
                            <option value="{{$type->type_ope}}">{{$type->type_ope}}</option>
                        @endforeach
                    </select>
                </th>
                <th>

                </th>
                <th class="text-center">
                    <button type="submit" class="btn border-success text-success btn-edit">Rechercher</button>
                    <a class="btn border-primary text-primary btn-add" href="/operateur/create">Ajouter</a>
                </th>
            </tr>
            {!! Form::close() !!}
            <tr>
                <th>id</th>
                <th>Prénom</th>
                <th>Nom</th>
                <th>CIN</th>
                <th>Date de nai</th>
                <th>Date d'embauche</th>
                <th>Num tele</th>
                <th>operateur</th>
                <th>Salaire</th>
                <th>Action</th>
            </tr>
            @if(count($operateur)>0)
                @foreach($operateur as $ope)
                    <tr>
                        <td>{{$ope->id}}</td>
                        <td>{{$ope->prenom_ope}}</td>
                        <td>{{$ope->nom_ope}}</td>
                        <td>{{$ope->cin_ope}}</td>
                        <td>{{$ope->date_nai_ope}}</td>
                        <td>{{$ope->date_emb_ope}}</td>
                        <td>{{$ope->num_tele_ope}}</td>
                        <td>{{$ope->type_ope}}</td>
                        <td>{{$ope->salaire}}</td>
                        <td>
                            <a href="/operateur/{{$ope->id}}" class="btn btn-consult border-primary text-primary"><i class="bi bi-eye"></i></a>
                            <a href="/operateur/{{$ope->id}}/edit" class="btn border-success text-success btn-edit"><i class="bi bi-pencil-square"></i></a>
                            <a href="#" class="btn border-danger text-danger btn-delete" data-id="{{$ope->prenom_ope}}"><i class="bi bi-trash3"></i></a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>Aucun operateur</tr>
            @endif
        </table>
    </div>
    <div class="text-center mt-3">
        {{$operateur->links()}}
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
                        window.location = "/operateur/delete/"+id;
                    }
                });
        });

    </script>
@endsection
