<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Filiere;
use App\Models\Groupe;
use App\Models\User;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $etudiants = Etudiant::paginate(5);
        $groupes = Groupe::all();
        $filieres = Filiere::all();
        $users = User::all();
        return view("admin.etudiant.index", compact("etudiants","filieres","groupes",'users'));

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
            $request->validate([
                'nom' => 'required|string|max:255',
                'prenom' => 'required|string|max:255',
                'cin' => 'required|string|max:255',
                'Adresse' => 'required|string|max:255',
                'tel' => 'required|numeric',
                'date_inscription' => 'required|date',
                'niveau' => 'required|string|max:255',
                'genre' => 'required|string|in:Homme,Femme',
                'filiere_id' => 'required|exists:filieres,id',
                'email' => 'required|email',
                'groupe_id' => 'required|exists:groupes,id',
            ]);
            // dd($request);
            if($request) {
                try {
                    Etudiant::create($request->post());
                    return redirect()->route('e.index')->with('success', 'Etudiant ajouté avec succès');
                } catch (\Exception $e) {
                    // Log the error
                    \Illuminate\Support\Facades\Log::error('Error creating Etudiant: ' . $e->getMessage());
                    // Redirect back with error message
                    return redirect()->back()->with('success', 'Une erreur est survenue lors de l\successajout de l\'Etudiant. Veuillez réessayer.');
                }
            }


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
        $etudiant = Etudiant::find($id);
        $etudiant->update($request->post());
        return redirect()->route('e.index')->with('success','Update successful! Changes have been saved.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $etudiant = Etudiant::find($id);
        $etudiant->delete();
        return redirect()->route('e.index')->with('danger','etudiant deleted successfully');
    }
}
