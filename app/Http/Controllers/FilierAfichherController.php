<?php

namespace App\Http\Controllers;

use App\Models\Filiere;
use Illuminate\Http\Request;

class FilierAfichherController extends Controller
{
    public function aficher()
    {
        $filiers = Filiere::paginate(5);
        return view("enseignant.filier.aficher", compact("filiers"));
    }
}
