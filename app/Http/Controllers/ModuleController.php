<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $modules = Module::paginate(5);
        $formations = Formation::all();
        return view("admin.module.index", compact("modules","formations"));
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
            'nom' => 'required|string|min:2',
            'nbr_hr'=>'required',
            'formation_id'=>'required|exists:formations,id',
        ]);
        Module::create($request->post());
        return redirect()->route('m.index')->with('success','Ajouter une nouvelle module avec succès');
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
        $module = Module::find($id);
        $module->update($request->post());
        return redirect()->route('m.index')->with('warning','Update successful! Changes have been saved.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $module = Module::find($id);
        $module->delete();
        return redirect()->route('m.index')->with('danger','Module deleted successfully');
    }
}
