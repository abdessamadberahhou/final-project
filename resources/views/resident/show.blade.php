@extends('layouts.app')

@section('section-1')
    <section class="container shadow mt-5 p-3 rounded-2 w-75 pb-5">
        @if($rs!=null)
            <div class="all pt-5">
                <div class="row text-center mb-5">
                    <h1><b>Informations sur le résident</b></h1>
                </div>
                <div class="row w-75 mx-auto">
                    <dl class="col-12 d-flex">
                        <dt class="col d-flex justify-content-between pe-5">ID <span>:</span> </dt>
                        <dd class="col">{{$rs->Id_resident}}</dd>
                    </dl>
                </div>
                <div class="row w-75 mx-auto">
                    <dl class="col-12 d-flex">
                        <dt class="col d-flex justify-content-between pe-5">Nom <span>:</span> </dt>
                        <dd class="col">{{$rs->Nom}}</dd>
                    </dl>
                </div>
                <div class="row w-75 mx-auto">
                    <dl class="col-12 d-flex">
                        <dt class="col d-flex justify-content-between pe-5">Prénom <span>:</span> </dt>
                        <dd class="col">{{$rs->Prenom}}</dd>
                    </dl>
                </div>
                <div class="row w-75 mx-auto">
                    <dl class="col-12 d-flex">
                        <dt class="col d-flex justify-content-between pe-5">Date de naissance <span>:</span> </dt>
                        <dd class="col">{{$rs->Date_nai}}</dd>
                    </dl>
                </div>
                <div class="row w-75 mx-auto">
                    <dl class="col-12 d-flex">
                        <dt class="col d-flex justify-content-between pe-5">CIN <span>:</span> </dt>
                        <dd class="col">{{$rs->CIN}}</dd>
                    </dl>
                </div>
                <div class="row w-75 mx-auto">
                    <dl class="col-12 d-flex">
                        <dt class="col d-flex justify-content-between pe-5">Numéro de téléphone <span>:</span> </dt>
                        <dd class="col">{{$rs->num_tele}}</dd>
                    </dl>
                </div>
                <div class="row w-75 mx-auto">
                    <dl class="col-12 d-flex">
                        <dt class="col d-flex justify-content-between pe-5">Nombre de personnes <span>:</span> </dt>
                        <dd class="col">{{$rs->nb_pers}}</dd>
                    </dl>
                </div>
                <div class="row w-75 mx-auto">
                    <dl class="col-12 d-flex">
                        <dt class="col d-flex justify-content-between pe-5">Adesse <span>:</span> </dt>
                        <dd class="col">{{$rs->adresse}}</dd>
                    </dl>
                </div>
                <div class="row w-75 mx-auto">
                    <dl class="col-12 d-flex">
                        <dt class="col d-flex justify-content-between pe-5">Cotisation mensuelle <span>:</span> </dt>
                        <dd class="col">{{$rs->montant_a_payer}} MAD</dd>
                    </dl>
                </div>
                <div class="retour text-center">
                    <a href="/resident" class="btn border-primary text-primary btn-add">Retour</a>
                </div>
            </div>
        @else
            <div class="text-center pt-4">
                <h2><b>Aucun resultat</b></h2>
            </div>
            <div class="retour text-center">
                <a href="/resident" class="btn border-primary text-primary btn-add">Retour</a>
            </div>
        @endif
    </section>
@endsection

@section('section-2')
    @if($rs!=null)
    <div class="container shadow mt-5">
        <table class="table">
                <tr>
                    <th><b>Mois</b></th>
                    <th class="month text-center">JANVIER</th>
                    <th class="month text-center">FÉVRIER</th>
                    <th class="month text-center">MARS</th>
                    <th class="month text-center">AVRIL</th>
                    <th class="month text-center">MAI</th>
                    <th class="month text-center">JUIN</th>
                    <th class="month text-center">JUILLET</th>
                    <th class="month text-center">AOÛT</th>
                    <th class="month text-center">SEPTEMBRE</th>
                    <th class="month text-center">OCTOBRE</th>
                    <th class="month text-center">NOVEMBRE</th>
                    <th class="month text-center">DÉCEMBRE</th>
                </tr>
            <tr>
                    <td><b>Statut</b></td>
                    <td class="statut text-center">{{$jan}}</td>
                    <td class="statut text-center">{{$feb}}</td>
                    <td class="statut text-center">{{$mar}}</td>
                    <td class="statut text-center">{{$apr}}</td>
                    <td class="statut text-center">{{$may}}</td>
                    <td class="statut text-center">{{$jun}}</td>
                    <td class="statut text-center">{{$jul}}</td>
                    <td class="statut text-center">{{$aug}}</td>
                    <td class="statut text-center">{{$sep}}</td>
                    <td class="statut text-center">{{$oct}}</td>
                    <td class="statut text-center">{{$nov}}</td>
                    <td class="statut text-center">{{$dec}}</td>
            </tr>
        </table>
    </div>
    <div class="total col-5 mx-auto shadow">
        <table class="table text-center">
            <tr>
                <th></th>
                <th class="month">Total des factures payées</th>
                <th class="month">Total des factures impayées</th>
            </tr>
            <tr>
                <td></td>
                <td id="tt_paye"><b>{{$sum_pay_res}} MAD</b></td>
                <td id="tt_n_paye"><b>{{$sum_n_pay_res}} MAD</b></td>
            </tr>
        </table>
    </div>
    @endif
@endsection

@section('extra-js')
    <script>
        let month = document.getElementsByClassName('month');
        let to_p = document.getElementById('tt_paye');
        let to_n_p = document.getElementById('tt_n_paye');
        to_p.style.color = '#0cf510';
        to_n_p.style.color = '#f5200c';
        for(let i=0;i<month.length;i++){
            month[i].style.color = 'darkgray';
        }
        let statut = document.getElementsByClassName('statut')
        for(let i=0;i<statut.length;i++){
            if(statut[i].innerHTML.toString() == 'payée'){
                statut[i].style.fontWeight = 'bold';
                statut[i].style.color = '#0cf510';
            }
            else if(statut[i].innerHTML == 'impayée'){
                statut[i].style.color = '#f5200c';
                statut[i].style.fontWeight = 'bold';
            }
        }
    </script>
@endsection


