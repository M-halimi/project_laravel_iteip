@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 mx-auto"> <!-- Added mx-auto class here -->
            <button class="cssbuttons-io-button" type="button"  data-toggle="modal"  data-target="#Addnew">
                <span>Add New EmploieEns</span>
                </button>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">EmploieEns</h4>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th class="text-center">Jour</th>
                                    <th class="text-center">Heure_debut</th>
                                    <th class="text-center">Heure_fin</th>
                                    <th class="text-center">Enseignant</th>
                                    <th class="text-center">Groupe</th>
                                    <th class="text-center">Module</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody align="center">
                                @foreach ($emploies as $emploie)
                                <tr>
                                    <td class="text-center">{{$emploie->jour }}</td>
                                    <td class="text-center">{{$emploie->Heure_debut }}</td>
                                    <td class="text-center">{{$emploie->Heure_fin }}</td>
                                    <td class="text-center">{{$emploie->enseignant->nom .' '.$emploie->enseignant->prenom}}</td>
                                    <td class="text-center">{{$emploie->groupe->nom }}</td>
                                    <td class="text-center">{{$emploie->module->nom}}</td>
                                    <td class="text-center">
                                        <div class="btn-group-custom">
                                            <a href="{{ route('emploiEns.edit',$emploie->id) }}" class="editBtn" data-toggle="modal" data-target="#Editnew{{ $emploie->id }}">
                                                <svg height="1em" viewBox="0 0 512 512"> 
                                                    <path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"></path>
                                                </svg>
                                            </a>
                                            <form action="{{ route('emploiEns.destroy', $emploie->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="Btn11" type="submit">
                                                    <div class="sign">
                                                        <svg viewBox="0 0 16 16" class="bi bi-trash3-fill" fill="currentColor" height="18" width="18" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"></path>
                                                        </svg>
                                                    </div>
                                                    <div class="text">Delete</div>
                                                </button>
                                            </form>
                                        </div>
                                    </td> 
                                </tr>
                                <div class="modal fade" id="Editnew{{ $emploie->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="container-fluid">
                                                <!-- Form for creating new data -->
                                                    <form class="form-valide" action="{{ route('emploiEns.update',$emploie->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-group">
                                                            <label class="col-lg-4 col-form-label" for="jour">Jour</label>
                                                            <input type="text" name="jour" value="{{ $emploie->jour }}" id="jour" class="form-control">
                                                            @error('jour')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-lg-4 col-form-label" for="Heure_debut">Heure_debut</label>
                                                            <input type="time" name="Heure_debut" value="{{ $emploie->Heure_debut }}" id="Heure_debut" class="form-control">
                                                            @error('Heure_debut')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-lg-4 col-form-label" for="Heure_fin">Heure_fin</label>
                                                            <input type="time" name="Heure_fin" value="{{ $emploie->Heure_fin }}" id="Heure_fin" class="form-control">
                                                            @error('Heure_fin')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-lg-4 col-form-label" for="enseignant_id">Formation</label>
                                                            <select name="enseignant_id" id="enseignant_id"  class="form-control selected" value="{{ $emploie->enseignant_id }}">
                                                                <option value="selected">Open this select Formation</option>
                                                                @foreach($enseignants as $enseignant)
                                                                <option value="{{ $enseignant->id }}"{{ $emploie->enseignant_id == $enseignant->id ? 'selected' : ' ' }}>{{ $enseignant->nom.' '.$enseignant->prenom}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('enseignant_id')
                                                                <div class="alert alert-danger mt-5">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-lg-4 col-form-label" for="module_id">Module</label>
                                                            <select name="module_id" id="module_id"  class="form-control selected" value="{{ $emploie->module_id }}">
                                                                <option value="selected">Open this select Module</option>
                                                                @foreach($modules as $module)
                                                                <option value="{{ $module->id }}"{{ $emploie->module_id == $module->id ? 'selected' : ' ' }}>{{ $module->nom}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('module_id')
                                                                <div class="alert alert-danger mt-5">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-lg-4 col-form-label" for="groupe_id">Groupe</label>
                                                            <select name="groupe_id" id="groupe_id"  class="form-control selected" value="{{ $emploie->groupe_id }}">
                                                                <option value="selected">Open this select Groupe</option>
                                                                @foreach($groupes as $groupe)
                                                                <option value="{{ $groupe->id }}"{{ $emploie->groupe_id == $groupe->id ? 'selected' : ' ' }}>{{ $groupe->nom}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('groupe_id')
                                                                <div class="alert alert-danger mt-5">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <!-- Other necessary form fields here -->
                                                        <div class="form-group row">
                                                            <div class="col-lg-8 ml-auto " >
                                                                <button class="button22">
                                                                    <span>Submit</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </tbody>
                        </table>
                        {{$emploies->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- model create --}}
<div class="modal fade" id="Addnew" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="container-fluid">
                <!-- Form for creating new data -->
                    <form class="form-valide" action="{{ route('emploiEns.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="col-lg-4 col-form-label" for="jour">Jour</label>
                            <input type="text" name="jour" id="jour" class="form-control">
                            @error('jour')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4 col-form-label" for="Heure_debut">Heure_debut</label>
                            <input type="time" name="Heure_debut" id="Heure_debut" class="form-control">
                            @error('Heure_debut')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4 col-form-label" for="Heure_fin">Heure_fin</label>
                            <input type="time" name="Heure_fin" id="Heure_fin" class="form-control">
                            @error('Heure_fin')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4 col-form-label" for="enseignant_id">Enseignant</label>
                            <select name="enseignant_id" id="enseignant_id"  class="form-control selected">
                                <option value="selected">Open this select Enseignant</option>
                                @foreach($enseignants as $enseignant)
                                <option value="{{ $enseignant->id }}">{{ $enseignant->nom.' '.$enseignant->prenom }}</option>
                                @endforeach
                            </select>
                            @error('enseignant_id')
                                <div class="alert alert-danger mt-5">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4 col-form-label" for="user_id">User</label>
                            <select name="user_id" id="user_id"  class="form-control selected">
                                <option value="selected">Open this select user</option>
                                @foreach($enseignants as $enseignant)
                                <option value="{{ $enseignant->id }}">{{ $enseignant->nom.' '.$enseignant->prenom }}</option>
                                @endforeach
                            </select>
                            @error('enseignant_id')
                                <div class="alert alert-danger mt-5">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4 col-form-label" for="groupe_id">Groupe</label>
                            <select name="groupe_id" id="groupe_id"  class="form-control selected">
                                <option value="selected">Open this select Formation</option>
                                @foreach($groupes as $groupe)
                                <option value="{{ $groupe->id }}">{{ $groupe->nom }}</option>
                                @endforeach
                            </select>
                            @error('groupe_id')
                                <div class="alert alert-danger mt-5">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4 col-form-label" for="module_id">Module</label>
                            <select name="module_id" id="module_id"  class="form-control selected">
                                <option value="selected">Open this select Formation</option>
                                @foreach($modules as $module)
                                <option value="{{ $module->id }}">{{ $module->nom }}</option>
                                @endforeach
                            </select>
                            @error('module_id')
                                <div class="alert alert-danger mt-5">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Other necessary form fields here -->
                        <div class="form-group row">
                            <div class="col-lg-8 ml-auto " >
                                <button class="button22">
                                    <span>Submit</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
