<?php

namespace App\Http\Controllers;


use App\Models\Groupe;
use App\Models\Module;
use App\Models\Etudiant;
use App\Models\EmploieEtus;
use Illuminate\Http\Request;

class EmploieEtudiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $emploies = EmploieEtus::paginate(5);
        $groupes = Groupe::all();
        $etudiants = Etudiant::all();
        $modules = Module::all();
        return view('admin.emploieEtu.index',compact('emploies','etudiants','modules','groupes'));
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
            'jour' => 'required|string|min:4',
            'Heure_debut' => 'required|date_format:H:i',
            'Heure_fin' => 'required|date_format:H:i|after:Heure_debut',
            'groupe_id' => 'required|exists:groupes,id',
            'etudiant_id' => 'required|exists:etudiants,id',
            'module_id' => 'required|exists:modules,id',
            ]);
            // dd($request);
            EmploieEtus::create($request->post());
            return redirect()->route('emploiEtuds.index')->with('success','Ajouter une nouvelle Emploie avec succès');
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
        $emploies = EmploieEtus::find($id);
        // dd($request);
        $emploies->update($request->post());
        return redirect()->route('emploiEtuds.index')->with('success','Update Emploie avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $emploie = EmploieEtus::find($id);
        $emploie->delete();
        return redirect()->route('emploiEtuds.index')->with('danger','delte');
    }
}
