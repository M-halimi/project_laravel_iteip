<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use Illuminate\Http\Request;

class ForamtionAfichherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function aficherForm()
    {
        $formations = Formation::paginate(5);
        return view("enseignant.formation.aficherForm", compact("formations"));
    }
}