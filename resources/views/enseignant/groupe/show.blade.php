@extends('layouts.app')
@section('content')
<div>
    <div class="container-fluid">
        
            <div class="row">
                 <a class="cssbuttons-io-button" type="sumbit"  href="{{ route('g.afichherEns') }}">
            <span>Back To Groupe</span>
            </a> 
            </div>
        <div class="row">
            <div class="col-12 mx-auto"> <!-- Added mx-auto class here -->
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">DETAIL DE ETUDIANT</h4>
                        <h4 class="card-title">Groupe {{ $groupes->nom }}</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th class="text-center">Nom</th>
                                        <th class="text-center">CIN</th>
                                        <th class="text-center">Adresse</th>
                                        <th class="text-center">Tel</th>
                                        <th class="text-center">Date_Inscription</th>
                                        <th class="text-center">Niveau</th>
                                        <th class="text-center">Filiere</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Genre</th>  
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($etudiants as $etudiant)
                                    <tr>
                                        <td class="text-center">{{$etudiant->nom.' '.$etudiant->prenom}}</td>
                                        <td class="text-center">{{$etudiant->cin}}</td>
                                        <td class="text-center">{{$etudiant->Adresse}}</td>
                                        <td class="text-center">{{$etudiant->tel}}</td>
                                        <td class="text-center">{{$etudiant->date_inscription}}</td>
                                        <td class="text-center">{{$etudiant->niveau}}</td>
                                        <td class="text-center">{{$etudiant->filiere->nom}}</td>
                                        <td class="text-center">{{$etudiant->email}}</td>
                                        <td class="text-center">{{$etudiant->genre}}</td>
                                        
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{$etudiants->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
