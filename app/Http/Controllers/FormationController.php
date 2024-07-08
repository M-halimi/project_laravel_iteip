<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class FormationController extends Controller
{

    public function index()
    {
        $formations = Formation::paginate(5);
        return view('admin.formation.index',compact('formations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'nom' => 'required|string|max:55',
            'duree' => 'required|numeric',
            'type' => 'required',
            'created_at'=>'required|date',
        ]);
        //  dd($request);
        Formation::create($request->post());
        //  dd($request);
        return redirect()->route('for.index')->with('success','Ajouter une nouvelle formation avec succès');


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

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $formation = Formation::find($id);
        // dd($formation);
        $formation->update($request->post());
        return redirect()->route('for.index')->with('success','Update successful! Changes have been saved.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $formation = Formation::find($id);
        $formation->delete();
        return redirect()->route('for.index')->with('success','formation deleted successfully');
    }
}
