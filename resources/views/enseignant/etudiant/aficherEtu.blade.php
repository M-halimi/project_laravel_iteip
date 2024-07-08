@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 mx-auto"> <!-- Added mx-auto class here -->
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">List du Etudiant</h4>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th class="text-center">Nom</th>
                                    <th class="text-center">Prenom</th>
                                    <th class="text-center">cin</th>
                                    <th class="text-center">Adresse</th>
                                    <th class="text-center">tel</th>
                                    <th class="text-center">date_inscription</th>
                                    <th class="text-center">niveau</th>
                                    <th class="text-center">genre</th>
                                    <th class="text-center">Groupe</th>
                                    <th class="text-center">filiere</th>
                                    <th class="text-center">Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($etudiants as $etudiant)
                                <tr>
                                    <td class="text-center">{{$etudiant->nom }}</td>
                                    <td class="text-center">{{$etudiant->prenom }}</td>
                                    <td class="text-center">{{$etudiant->cin }}</td>
                                    <td class="text-center">{{$etudiant->Adresse}}</td>
                                    <td class="text-center">{{$etudiant->tel }}</td>
                                    <td class="text-center">{{$etudiant->date_inscription }}</td>
                                    <td class="text-center">{{$etudiant->niveau }}</td>
                                    <td class="text-center">{{$etudiant->genre }}</td>
                                    <td class="text-center">{{$etudiant->groupe->nom }}</td>
                                    <td class="text-center">{{$etudiant->filiere->nom }}</td>
                                    <td class="text-center">{{$etudiant->email }}</td>
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
@endsection
