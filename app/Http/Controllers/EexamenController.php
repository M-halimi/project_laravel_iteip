<?php

namespace App\Http\Controllers;

use App\Models\Examen;
use App\Models\Groupe;
use App\Models\Module;
use Illuminate\Http\Request;

class EexamenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $examens = Examen::paginate(5);
        $groupes = Groupe::all();
        $modules = Module::all();
        return view("admin.examen.index", compact("groupes",'examens','modules'));
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
                'date' => 'required|date',
                'type' => 'required',
                'groupe_id' => 'required|exists:groupes,id',
                'module_id' => 'required|exists:modules,id',

        ]
            );
            // dd($request->post());
            Examen::create(
                $request->post()
        );
            return redirect()->route('exm.index')->with('success','Ajouter une nouvelle Examen avec succès');
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
        $exmaen = Examen::find($id);
        // dd($exmaen);
        $exmaen->update($request->post());
        return redirect()->route('exm.index')->with('success','Update successful! Changes have been saved.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $exmaen = Examen::find($id);
        $exmaen->delete();
        return redirect()->route('exm.index')->with('danger','Filiere has been successfully deleted.');

    }
}
