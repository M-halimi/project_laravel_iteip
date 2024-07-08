<?php

namespace App\Http\Controllers;

use App\Models\Enseignant;
use App\Models\Groupe;
use App\Models\User;
use Illuminate\Http\Request;

class EnseignantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $enseignants = Enseignant::paginate();
        $users = User::all();
        // $groupes = Groupe::all();
        return view("admin.enseignants.index", compact("enseignants","users"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'cin' => 'required|string|max:255',
            'tel' => 'required|string|max:20',
            'diplome' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'genre' => 'required',
            'atestation_exp' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'salaire' => 'required|numeric',
            'statut_salarie' => 'required|string|max:100',
            'email' => 'required|email',
            'user_id' => 'required|exists:users,id',
        ]
    );

        if ($diplome = $request->file('diplome')) {
            $destinationPath = 'image_diplome_ensg/';
            $profileImage = date('YmdHis') . "." . $diplome->getClientOriginalExtension();
            $diplome->move($destinationPath, $profileImage);
            $request['diplome'] = $profileImage;
        }
        if ($atestation_exp = $request->file('atestation_exp')) {
            $destinationPath = 'image_atestation/';
            $profileImage = date('YmdHis') . "." . $atestation_exp->getClientOriginalExtension();
            $atestation_exp->move($destinationPath, $profileImage);
            $request['atestation_exp'] = $profileImage;
        }
        //  dd($request);
        Enseignant::create($request->post());
        //  dd($request);
        return redirect()->route('ens.index')->with('success','Ajouter une nouvelle enseignant avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $enseignant = Enseignant::find($id);
        $enseignant->update($request->post());
        if ($request->hasFile('diplome')) {
            $photoName = date('YmdHis') . '.' . $request->diplome->getClientOriginalExtension();
            $request->diplome->move(public_path('image_diplome_ensg'), $photoName);
            $enseignant->diplome = $photoName;

        } else {
            unset($request['diplome']);
        }
        if ($request->hasFile('atestation_exp')) {
            $photoName = date('YmdHis') . '.' . $request->atestation_exp->getClientOriginalExtension();
            $request->atestation_exp->move(public_path('image_atestation'), $photoName);
            $enseignant->atestation_exp = $photoName;

        } else {
            unset($request['atestation_exp']);
        }
        $enseignant->save();
        return redirect()->route('ens.index')->with('warning','Update successful! Changes have been saved.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $enseignants = Enseignant::find($id);
        $enseignants->delete();
        return redirect()->route('ens.index')->with('danger','enseignant deleted successfully');
    }
}
