<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PDOException;



class LoginController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware("auth");
    // }


    public function register()
    {
       return view('admin.register.register');
    }

    Public function store(Request $request)
    {
        $request->validate([
            'first_name' =>'required',
            'last_name' =>'required',
            'email' =>'required',
            'password' =>'required',
            'verified_password' =>'required',
            'type' =>'required',
        ]);
        $hashedPassword = Hash::make($request->password);
        $requestData = $request->post();
        $requestData['password'] = $hashedPassword ;
        try {
            // Attempt to create a user
            User::create($requestData);
        } catch (QueryException $e) {
            // Check if the error message contains information about a duplicate entry
            if (strpos($e->getMessage(), 'Duplicate entry') !== false) {
                // Handle the case where the email already exists
                echo "The email address already exists.";
            } else {
                // Handle other database errors
                echo "Database error: " . $e->getMessage();
            }
        } catch (PDOException $e) {
            // Handle other PDO exceptions
            echo "Database error: " . $e->getMessage();
        }

          return redirect()->route('admin.login')->with('success','ajouter un bein');
        // dd($hashedPassword);

        // dd($requestData);
        // $email => $request->input("email"),
        // $password=> $request->input("password"),
    }
    public function login(Request $request)
    {
        // $hasepassword = Hash::make($request->password);
        // $values ['password'] = $hasepassword;
        // $type = $request->type;
        $email = $request->email;
        $password = $request->password;
        // $verified_password = $request->verified_password;
        // $first_name = $request->first_name;
        $values = ['email' => $email,'password'=> $password ];
        // dd($values);
        if(Auth::attempt($values)){
            $request->session()->regenerate();
            if (Auth::user()->type == "admin") {
                return redirect()->route("admin.dashboard")->with("success","Welcome!  $email .'' . 'Vous êtes connecté avec succèss'");
            }elseif (Auth::user()->type == "Etudiant") {
            return redirect()->route('etudiant.dashboard')->with('success', 'Welcome!'. '   '.  $email .'  ' . 'Vous êtes connecté avec succèss');
            } elseif(Auth::user()->type == 'Stagiaire') {
                return redirect()->route('stagiaire.dashboard')->with('success', 'Welcome!'. '   '.  $email .'  ' . 'Vous êtes connecté avec succèss');
            } elseif(Auth::user()->type == 'Enseignant') {
                return redirect()->route('enseignant.dashboard')->with('success', 'Welcome!'. '   '.  $email .'  ' . 'Vous êtes connecté avec succèss');
        }else{
            return redirect()->back()->with('danger', 'Invalid email or password.');
        }
    }}
    public function logout(Request $request)
    {
     session()->flush();
     Auth::logout();
     return redirect()->route('admin.login')->with('success', 'You have been logged out successfully.');

    }
}
