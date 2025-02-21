<?php

namespace App\Http\Controllers;
use App\Models\Annonce;
use App\Models\User;
use App\Models\category;

use Illuminate\Http\Request;
use Illuminate\View\AnonymousComponent;

class AnnonceController extends Controller
{


   
    public function index()
{
    $users = User::with('annonces')->get();  
    $categories = Category::all(); 
    $countAll = Annonce::count();
                            
    $countLost = Annonce::where('type', 'Lost')->count();

    $countFound = Annonce::where('type', 'Found')->count();

    

    return view('home', compact('users','categories','countAll', 'countLost', 'countFound'));
}

    
public function show($id)
{
    $annonces = Annonce::with(['user', 'comments.user'])->findOrFail($id);

    return view('details', compact('annonces'));
}



    public function store(Request $request)
    {
        if (!auth()->check()) {
            return redirect()->route('register')->with('error', 'Veuillez vous connecter pour créer une annonce.');
        }
    
        $titre = $request->title;
        $phone = $request->phone;
        $location = $request->location;
        $description = $request->description;
        $category = $request->category;
        $type = $request->type;
        // dd($request->hasFile('image'));
        if ($request->hasFile('image')) {
            $photoPath = $request->file('image')->store('images', 'public');
            $image = $photoPath;
        }

    
        Annonce::create([
            'title' => $titre,
            'type' => $type,
            'description' => $description,
            'image' => $image ?? null,
            'lieu' => $location,
            'phone' => $phone,
            'categorie_id' => $category,
            'user_id' => auth()->id(),
        ]);
    
        return redirect()->route('home')->with('success', 'Annonce créée avec succès!');
 
    }

    
    public function search(Request $request)
{
    $search = $request->input('title'); 
    $type = $request->input('type'); 

    $annonces = annonce::query();

    if ($search) {
        $annonces->where('title', 'like', '%' . $search . '%');
    }

    if ($type) {
        $annonces->where('type', $type);
    }

    $annonces = $annonces->get();

    // Passer les résultats à la vue
    return view('search_results', compact('annonces')); 
}
                   


}
