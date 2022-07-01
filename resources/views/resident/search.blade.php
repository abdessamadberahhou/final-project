@extends('layouts.app')

@section('section-1')
@endsection
@section('section-2')
    <div class=" container-xl container-xxl mt-5 shadow">
        <table class="table text-center" id="datatable">
            <tr>
                {!! Form::open(['action' => '\App\Http\Controllers\residentController@search', 'method'=>'GET']) !!}
                <th class="col-lg-1">
                    <input type="text" class="form-control text-center filter-input" name="id"
                           placeholder="id" data-column="0">
                </th>
                <th class="col-lg-2">
                    <input type="text" class="form-control text-center filter-input" name="prenom"
                           placeholder="prenom" data-column="1">
                </th>
                <th class="col-lg-2">
                    <input type="text" class="form-control text-center filter-input" name="nom"
                           placeholder="nom" data-column="2">
                </th>
                <th>

                </th>
                <th class="col-lg-1">
                    <input type="text" class="form-control text-center filter-input" name="CIN"
                           placeholder="CIN" data-column="3">
                </th>
                <th>

                </th>
                <th>

                </th>
                <th class="col-lg-1">
                    <select name="batiment" class="form-select filter-input1" id="" data-column="4">
                        <option value="">Tous</option>
                        @foreach($batiment as $bat)
                            <option value="{{$bat->nom_bat}}">{{$bat->nom_bat}}</option>
                        @endforeach
                    </select>
                </th>
                <th>
                    <button type="submit" class="btn border-success text-success btn-edit">Rechercher</button>
                    <a href="/resident/create" class="btn text-primary border-primary btn-add">Ajouter</a>
                </th>
            </tr>
            {!! Form::close() !!}
            <tr>
                <th>Id</th>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Date nais</th>
                <th>CIN</th>
                <th>Num télé</th>
                <th>Nb pers</th>
                <th>Adresse</th>
                <th class="text-center">Action</th>
            </tr>
            </tr>
            @if(count($resident)>0)
                @foreach($resident as $res)
                    <tr>
                        <td>{{$res->Id_resident}}</td>
                        <td>{{$res->Prenom}}</td>
                        <td>{{$res->Nom}}</td>
                        <td>{{$res->Date_nai}}</td>
                        <td>{{$res->CIN}}</td>
                        <td>{{$res->num_tele}}</td>
                        <td>{{$res->nb_pers}}</td>
                        <td>{{$res->adresse}}</td>
                        <td class="text-center">
                            <a href="/resident/{{$res->Id_resident}}" class="btn btn-consult border-primary text-primary"><i class="bi bi-eye"></i></a>
                            <a href="resident/{{$res->Id_resident}}/edit" class="btn btn-edit border-success text-success"><i class="bi bi-pencil-square"></i></a>
                            <a class="btn-delete btn border-danger text-danger" data-name="{{$res->Prenom}}" data-id="{{$res->Id_resident}}" href="#"><i class="bi bi-trash3"></i></a>
                        </td>
                    </tr>
                @endforeach
        </table>
        <div class="paginate text-center">
            {{$resident->links()}}
        </div>
        @else
        </table>
        <div class="no_records text-center p-3">
            <h4><b>Aucun resultat</b></h4>
        </div>
    </div>
    @endif
    <script src="{{asset('js/jquery.js')}}"></script>
    <script>
        $('.btn-delete').click(function (){
            var name = $(this).attr('data-name');
            var id = $(this).attr('data-id');
            swal({
                title: "voulez vou vraiment supprimer "+name,
                text: "",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "/resident/delete/"+id;
                    }
                });
        });
    </script>

@endsection
