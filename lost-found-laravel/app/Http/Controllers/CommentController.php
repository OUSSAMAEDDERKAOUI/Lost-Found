<?php

namespace App\Http\Controllers;

use App\Models\comment;
use App\Models\annonce;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function add(Request $request)
    {
        if (!auth()->check()) {
            return redirect()->route('register')->with('error', 'Veuillez vous connecter Ajouter un commentaire.');
        }
    
        $comment = $request->comment;
        $annonce_id=$request->annonce_id;

        comment::create([
            'contenu' => $comment,
            'id_annonce' => $annonce_id,
            'id_user' => auth()->id(),
        ]);
        $annonces = annonce::with('user')->findOrFail($annonce_id); 
        return view('details', compact('annonces'));
        // return redirect()->route('details')->with('success', 'Annonce créée avec succès!');
    }
}
