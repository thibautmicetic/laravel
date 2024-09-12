<?php

namespace App\Http\Controllers;

use App\Models\DemandeContact;
use Illuminate\Http\Request;

class DemandeContactController extends Controller
{
    public function demandes() {
        return view('formulaire');
    }

    public function createDemande(Request $request) {
        $validated = $request->validate([
            'titre' => 'required|max:100',
            'texte' => 'required|max:255',
            'email' => 'required|email|max:50'
        ]);

        DemandeContact::create($request->all());
        return redirect()->back()->with('success', 'La demande a été envoyée');
    }
}
