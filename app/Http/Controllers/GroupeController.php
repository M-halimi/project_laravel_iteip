<?php

namespace App\Http\Controllers;

use App\Models\Groupe;
use App\Models\Etudiant;
use App\Models\Formation;
use Illuminate\Http\Request;

class GroupeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $groupes = Groupe::paginate(5);
        $formations = Formation::all();
        $etudiants = Etudiant::all();
        return view("admin.groupe.index", compact("groupes","formations",'etudiants'));

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
            'nom'=> 'required|string|min:2',
            'formation_id'=> 'required|exists:formations,id',
        ]);

        Groupe::create(
            $request->post()
        );
        // dd($request->post());
        return redirect()->route('g.index')->with('success','Ajouter une nouvelle Groupe avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $groupes = Groupe::find($id);
        // $etudiants = count($etudiants)->get();
        $etudiants = Etudiant::where('groupe_id',$id)->paginate(5);
        return view('admin.groupe.show',["groupes"=>$groupes,"etudiants"=>$etudiants]);

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
        $groupe = Groupe::find($id);
        $groupe->update($request->post());
        return redirect()->route('g.index')->with('warning','Update successful! Changes have been saved.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $groupe = Groupe::find($id);
        $groupe->delete();
        return redirect()->route('g.index')->with('danger','Groupe has been successfully deleted.');
    }
}
