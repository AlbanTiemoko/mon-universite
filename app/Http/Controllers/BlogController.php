<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Article;


class BlogController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            "titre" => ['required', 'string', 'max:255'],
            "image" => ['required', 'image', 'mimes:jpeg,png', 'max:10000'],
            "date" => ['required', 'date'],
            "description" => ['nullable', 'string']
        ]);

        // Traitement des fichiers
        $imageName = time().'_'.$request->file('image')->getClientOriginalName();
        $chemin = "assets/blog/";
        $request->file('image')->move(public_path($chemin), $imageName);

        // Générer automatiquement la référence
        $last = Article::latest()->first();
        $nextId = $last ? $last->id + 1 : 1;
        $reference = 'ACTU-' . $nextId;

        // Création de l'article
        $article = Article::create([
            'slug' => Str::slug($request->titre).'-'.uniqid(),
            'reference' => $reference,
            'titre' => $request->titre,
            'date' => $request->date,
            'image' => $chemin.$imageName,
            'description' => $request->description,
            'user_created_id' => Auth::id(),
        ]);

        return redirect()->route('liste.article')
            ->with("success", "Article enregistré avec succès");
    }

    public function destroy($id)
    {
        Article::where("id","=",$id)->delete();
        return redirect()->route('liste.article')->with("success","Article supprimée avec succès.");
    }

    public function edit($id)
    {   
        $article = Article::findOrfail($id);
        return view('admin.blog.edit', compact('article'));
    }

    public function update(Request $request, $id)
    { 
        $validated = $request->validate([
            "titre" => ['required', 'string', 'max:255'],
            "image" => ['required', 'image', 'mimes:jpeg,png', 'max:10000'],
            "date" => ['required', 'date'],
            "description" => ('nullable')
        ]);

        // Traitement des fichiers
        $imageName = time().'_'.$request->file('image')->getClientOriginalName();
        $chemin = "assets/blog/";
        $request->file('image')->move(public_path($chemin), $imageName);
        
        $mode_etudes = Article::find($id);
        $mode_etudes->update([
            'titre' => $request->titre,
            'date' => $request->date,
            'image' => $chemin.$imageName,
            'description' => $request->description,
            'user_updated_id' => auth()->id()
        ]);
        
        return redirect()->route('liste.article')->with("success","Article ". $request->titre ." mis à jour avec succès.");
    }
}
