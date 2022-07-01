@extends('layouts.app')
@section('section-1')
@endsection
@section('section-2')
    <div class="container-xl container-lg shadow mt-5">
        <table class="table table-striped">
            <tr>
                {!! Form::open(['action' => '\App\Http\Controllers\factureController@search', 'method'=>'GET']) !!}
                <th class="col-1">
                    <input type="text" name="id" id="" class="form-control text-center" placeholder="id">
                </th>
                <th class="col-2">
                    <select name="type_fact" id="" class="form-control text-center">
                        <option value="">Choisir votre type</option>
                        @foreach($type as $type_f)
                            <option value="{{$type_f->valeur_type}}">{{$type_f->valeur_type}}</option>
                        @endforeach
                    </select>
                </th>
                <th class="col-2">
                    <input type="text" name="reference" id="" class="form-control text-center" placeholder="réference">
                </th>
                <th>
                    <select name="month" id="month" class="form-control text-center">
                        <option value="">Tout</option>
                        <option value="1">Janvier</option>
                        <option value="2">Fevrier</option>
                        <option value="3">Mars</option>
                        <option value="4">April</option>
                        <option value="5">Mai</option>
                        <option value="6">June</option>
                        <option value="7">Juillet</option>
                        <option value="8">Aout</option>
                        <option value="9">Septembre</option>
                        <option value="10">Octobre</option>
                        <option value="11">Nouvembre</option>
                        <option value="12">Decembre</option>
                    </select>
                </th>
                <th class="col-1">
                    <input type="text" name="id_res" id="id_res" class="form-control text-center" placeholder="Res">
                </th>
                <th>
                    <select name="batiment" class="form-control text-center" id="">
                        <option value="">Tout</option>
                        @foreach($batiment as $bat)
                            <option value="{{$bat->nom_bat}}">{{$bat->nom_bat}}</option>
                        @endforeach
                    </select>
                </th>
                <th></th>
                <th class="text-center">
                    <button class="btn text-success border-success btn-edit">Rechercher</button>
                    <a href="/facture/create" class="btn border-primary text-primary btn-add">Ajouter</a>
                    <a href="generate/facture" class="btn btn-secondary">generate</a>
                </th>
                {!! Form::close() !!}
            </tr>
            <tr>
                <th class="text-center">id</th>
                <th class="text-center">Type facture</th>
                <th class="text-center">Reference</th>
                <th class="text-center">Date d'ajoute</th>
                <th class="text-center">Id res</th>
                <th class="text-center">Batiment</th>
                <th class="text-center">Staut</th>
                <th class="text-center">Action</th>
            </tr>
            @if(count($facture)>0)
                @foreach($facture as $fac)
                    <tr>
                        <td class="text-center">{{$fac->id}}</td>
                        <td class="text-center">{{$fac->type_facture}}</td>
                        <td class="text-center text-nowrap">{{$fac->reference_facture}}</td>
                        <td class="text-center">{{$fac->date_ajout}}</td>
                        <td class="text-center">{{$fac->Id_res}}</td>
                        <td class="text-center">{{$fac->batiment}}</td>
                        <td class="text-center">{{$fac->statut}}</td>
                        <td class="text-center">
                            {!! Form::open(['action'=>['\App\Http\Controllers\factureController@pay',$fac->id],'method'=>'GET']) !!}
                            <a href="/facture/{{$fac->id}}" class="btn btn-consult border-primary text-primary"><i class="bi bi-eye"></i></a>
                            <a  class="btn btn-edit border-success text-success" href="/facture/{{$fac->id}}/edit"><i class="bi bi-pencil-square"></i></a>
                            <a href="#" data-id="{{$fac->id}}" class="deletebtn btn btn-delete border-danger text-danger"><i class="bi bi-trash3"></i></a>

                            @if($fac->statut != 'payé')
                                <button class="btn border-info text-info"@if($fac->statut == 'payé')
                                hidden
                                    @endif>
                                    <i class="bi bi-cash"></i>
                                </button>
                            @endif
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
        </table>
        @endif
        <div class="paginate text-center">
            {{$facture->links()}}
        </div>
    </div>
    <script src="{{asset('js/jquery.js')}}"></script>
    <script>
        $('.deletebtn').click(function (){
            var id = $(this).attr('data-id');
            swal({
                title: "voulez vous vraiment supprimer cette facture",
                text: "",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "/facture/delete/"+id;
                    }
                });
        });

    </script>
@endsection
