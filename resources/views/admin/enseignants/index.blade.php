@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 mx-auto"> <!-- Added mx-auto class here -->
            <button class="cssbuttons-io-button" type="button"  data-toggle="modal"  data-target="#Addnew">
                <span>Add New Enseignant</span>
                </button>
            <div class="card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">List enseignants</h4>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th class="text-center">Nom</th>
                                    <th class="text-center">Prenom</th>
                                    <th class="text-center">cin</th>
                                    <th class="text-center">tel</th>
                                    <th class="text-center">Diplome</th>
                                    <th class="text-center">Atestation_exp</th>
                                    <th class="text-center">salarie</th>
                                    <th class="text-center">Statut_salarie</th>
                                    <th class="text-center">Genre</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($enseignants as $enseignant)
                                <tr>
                                    <td class="text-center">{{$enseignant->nom }}</td>
                                    <td class="text-center">{{$enseignant->prenom }}</td>
                                    <td class="text-center">{{$enseignant->cin }}</td>
                                    <td class="text-center">{{$enseignant->tel }}</td>
                                    <td class="text-center"><img src="/image_diplome_ensg/{{ $enseignant->diplome }}" alt="diplome" style="border-radius: 60%" width="50px" ></td>
                                    <td class="text-center"><img src="/image_atestation/{{$enseignant->atestation_exp}}" alt="diplome" style="border-radius: 60%" width="50px"></td>
                                    <td class="text-center">{{$enseignant->salaire . 'DH ' }}</td>
                                    <td class="text-center">{{$enseignant->statut_salarie }}</td>
                                    <td class="text-center">{{$enseignant->genre }}</td>
                                    <td class="text-center">{{$enseignant->email }}</td>
                                    <td class="text-center">
                                        <div class="btn-group-custom">
                                            <a href="{{ route('ens.edit',$enseignant->id) }}" class="editBtn" data-toggle="modal" data-target="#Editnew{{ $enseignant->id }}">
                                                <svg height="1em" viewBox="0 0 512 512"> 
                                                    <path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"></path>
                                                </svg>
                                            </a>
                                            <form action="{{ route('ens.destroy', $enseignant->id) }}" method="POST" style="display:inline;">
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
                                {{-- start edit --}}
                                <div class="modal fade" id="Editnew{{ $enseignant->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="container-fluid">
                                                <!-- Form for editing existing data -->
                                        <form action="{{ route('ens.update', $enseignant->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label class="col-lg-4 col-form-label" for="nom">Nom</label>
                                                <input type="text" name="nom" id="nom" value="{{ $enseignant->nom }}"  class="form-control">
                                                @error('nom')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-4 col-form-label" for="prenom">Prenom</label>
                                                <input type="text" name="prenom" id="prenom" value="{{ $enseignant->prenom }}"  class="form-control">
                                                @error('prenom')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-4 col-form-label" for="cin">Cin</label>
                                                <textarea type="text" name="cin" id="cin" class="form-control">{{ $enseignant->cin }}</textarea>
                                                @error('cin')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-4 col-form-label" for="tel">Tel</label>
                                                <input type="text" name="tel" id="tel" value="{{ $enseignant->tel }}"  class="form-control">
                                                @error('tel')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-4 col-form-label" for="diplome">Diplome</label>
                                                <input type="file" name="diplome" id="diplome"  class="form-control">
                                                <img src="/image_diplome_ensg/{{ $enseignant->diplome }}" alt="DIPLOME">
                                                @error('diplome')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-4 col-form-label" for="atestation_exp">Atestation</label>
                                                <input type="file" name="atestation_exp" id="atestation_exp"   class="form-control">
                                                <img src="/image_atestation/{{ $enseignant->atestation_exp }}" alt="DIPLOME">
                                                @error('atestation_exp')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-4 col-form-label" for="salaire">Salaire</label>
                                                <input type="text" name="salaire" id="salaire" value="{{ $enseignant->salaire }}"  class="form-control">
                                                @error('salaire')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-4 col-form-label" for="statut_salarie">Statut_Salarie</label>
                                                <input type="text" name="statut_salarie" id="statut_salarie" value="{{ $enseignant->statut_salarie }}"  class="form-control">
                                                @error('statut_salarie')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-groupe">
                                                <label class="col-lg-4 col-form-label" for="genre">Genre</label>
                                                <select name="genre" id="genre"  class="form-control selected" value="{{ $enseignant->genre }}">
                                                    <option value="selected">Open this select Geenre</option>
                                                    <option value="Homme"{{ $enseignant->genre == 'Homme' ? 'selected' : '' }}>Homme</option>
                                                    <option value="Femme" {{ $enseignant->genre == 'Femme' ? 'selected' : '' }}>Femme</option>
                                                </select>
                                                @error('genre')
                                                    <div  class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-4 col-form-label" for="niveau">Email</label>
                                                    <input type="email" name="email" value="{{ $enseignant->email }}"  id="email" class="form-control">
                                                    @error('email')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
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
                                {{-- end edit --}}
                                @endforeach
                            </tbody>
                        </table>
                        {{$enseignants->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 {{-- CREATE MODUL --}}
<div class="modal fade" id="Addnew" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="container-fluid">
                <!-- Form for creating new data -->
                    <form class="form-valide" action="{{ route('ens.store') }}" method="POST"  enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="col-lg-4 col-form-label" for="nom">Nom</label>
                            <input type="text" name="nom" id="nom" class="form-control">
                            @error('nom')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4 col-form-label" for="prenom">Prenom</label>
                            <input type="text" name="prenom" id="prenom" class="form-control">
                            @error('prenom')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4 col-form-label" for="cin">Cin</label>
                            <input type="text" name="cin" id="cin" class="form-control">
                            @error('cin')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4 col-form-label" for="tel">Tel</label>
                            <input type="number" name="tel" id="tel" class="form-control">
                            @error('tel')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4 col-form-label" for="diplome">Diplome</label>
                            <input type="file" name="diplome" id="diplome" class="form-control">
                            @error('diplome')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4 col-form-label" for="atestation_exp">Attestation</label>
                            <input type="file" name="atestation_exp" id="atestation_exp" class="form-control">
                            @error('atestation_exp')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4 col-form-label" for="salaire">Salaire</label>
                            <input type="number" name="salaire" id="salaire" class="form-control">
                            @error('salaire')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4 col-form-label" for="statut_salarie">statut_salarie</label>
                            <input type="text" name="statut_salarie" id="statut_salarie" class="form-control">
                            @error('statut_salarie')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-groupe">
                        <label class="col-lg-4 col-form-label" for="genre">Genre</label>
                        <select name="genre" id="genre" class="form-control selected">
                            <option value="selected">Open this select Geenre</option>
                            <option value="Homme">Homme</option>
                            <option value="Femme">Femme</option>
                        </select>
                        @error('genre')
                            <div  class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="form-groupe">
                            <label class="col-lg-4 col-form-label" for="user_id">User</label>
                            <select name="user_id" id="user_id" class="form-control selected">
                                <option value="selected">Open this select Users</option>
                                @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->last_name.' '.$user->first_name }}</option>
                                @endforeach
                                
                            </select>
                            @error('user_id')
                                <div  class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            </div>
                        <div class="form-group">
                            <label class="col-lg-4 col-form-label" for="niveau">Email</label>
                            <input type="email" name="email"  id="email" class="form-control">
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- <div class="form-group">
                            <label class="col-lg-4 col-form-label" for="niveau">Groupe</label>
                            <select name="groupe_id" id="groupe_id"></select>
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div> --}}
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
