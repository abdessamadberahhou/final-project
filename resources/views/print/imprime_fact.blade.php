@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{asset('css/invoice.css')}}">
@endsection
@section('section-1')
    <div class="container">
        <div class="container">
            <div class="row">
                <div class="shadow col-md-7 col-md-offset-3 body-main mx-auto mt-4">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4"> <i class="fa-solid fa-building display-1"></i> </div>
                        </div> <br />
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h2>Facture</h2>
                                <h5>{{$facture->id}}</h5>
                            </div>
                        </div> <br />
                        <div>
                            <table class="table text-nowrap">
                                <thead>
                                <tr>
                                    <th>
                                        <h5>Description</h5>
                                    </th>
                                    <th>
                                        <h5>Detail</h5>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($facture->Id_res != 0)
                                    <tr>
                                        <td class="col-md-9">Nom de résident</td>
                                        <td class="col-md-3">{{$facture->nom_res}}</td>
                                    </tr>
                                @elseif($facture->id_ope != 0)
                                    <tr>
                                        <td class="col-md-9">Nom d'operateur</td>
                                        <td class="col-md-3">{{$facture->nom_ope}}</td>
                                    </tr>
                                @endif
                                <tr>
                                    <td class="col-md-9">Type de facture</td>
                                    <td class="col-md-3">{{$facture->type_facture}}</td>
                                </tr>
                                <tr>
                                    <td class="col-md-9">Réference de Facture</td>
                                    <td class="col-md-3">{{$facture->reference_facture}}</td>
                                </tr>
                                <tr>
                                    <td class="col-md-9">Date d'ajout</td>
                                    <td class="col-md-3">{{$facture->date_ajout}} </td>
                                </tr>
                                <tr>
                                    <td class="col-md-9">Batiment</td>
                                    <td class="col-md-3">{{$facture->batiment}}</td>
                                </tr>
                                <tr>
                                    <td class="col-md-9">Statut</td>
                                    <td class="col-md-3">{{$facture->statut}}</td>
                                </tr>
                                @if($facture->statut == 'payée')
                                    <tr>
                                        <td class="col-md-9">Facture d{{$type}}</td>
                                        <td class="col-md-3">
                                            @if($facture->nom_res != null)
                                                {{$facture->Id_res}}
                                            @elseif($facture->nom_ope !=0)
                                                {{$facture->id_ope}}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-9">Date de payment</td>
                                        <td class="col-md-3">{{$facture->date_payment}}</td>
                                    </tr>
                                @endif
                                <tr style="color: #F81D2D;">
                                    <td class="text-right">
                                        <h4><strong>Total:</strong></h4>
                                    </td>
                                    <td class="text-left">
                                        <h4><strong> {{$facture->montant}} MAD</strong></h4>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div>
                            <div class="col-md-12">
                                <p><b>Date :</b> {{date('d/m/Y')}}</p> <br />
                                <p><b>Signature</b></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.addEventListener('load', function (){
                window.print();

            });
    </script>
@endsection
