<?php

namespace App\Http\Controllers;

use App\Models\DemandeContact;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Mockery\Generator\StringManipulation\Pass\Pass;

class AuthentificationController extends Controller
{
    public function login() {
        return view('auth/login');
    }

    public function traitementLogin(Request $request) {
        $mdp = $request->password;
        $email = $request->email;
        $utilisateur = Utilisateur::where('email', $email)->first();
        $estValide = password_verify($mdp, $utilisateur->password);

        if ($estValide) {
            $request->session()->put('user', $utilisateur);
            return redirect('/todos');
        } else {
            return redirect('/login')->with('error', 'Identifiants incorrects');
        }
    }

    public function register() {
        return view('auth/register');
    }

    public function traitementRegister(Request $request) {
        $validated = $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email|max:255',
            'password' => 'required|max:100',
        ]);

        $hash = password_hash($request->password, PASSWORD_DEFAULT);

        Utilisateur::create(['name' => $request->name, 'email' => $request->email, 'password' => $hash]);
        return redirect()->back()->with('success', 'La demande a été envoyée');
    }

}
