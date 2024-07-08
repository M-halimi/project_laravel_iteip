@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Emplois du EnseignantX</h4>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th class="text-center">Jour</th>
                                    <th class="text-center">Heure de début</th>
                                    <th class="text-center">Heure de fin</th>
                                    <th class="text-center">Groupe</th>
                                    <th class="text-center">Module</th>
                                    <th class="text-center">Enseignant</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($emploies as $emploie)
                                            <td>{{ $emploie->jour }}</td>
                                            <td>{{ $emploie->Heure_debut }}</td>
                                            <td>{{ $emploie->Heure_fin }}</td>
                                            <td>{{ $emploie->groupe->nom }}</td>
                                            <td>{{ $emploie->module->nom }}</td>
                                            <td>{{ $emploie->enseignant->nom. ' '. $emploie->enseignant->prenom}}</td>
                                        </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- {{ $emploies->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
