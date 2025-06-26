<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Newsletter;

class NewsletterController extends Controller
{

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom_prenom_newsletter' => 'required|string|max:255',
            'newsletter_email' => 'required|email|unique:newsletters,email',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Cet email est déjà inscrit à la newsletter.');
        }

        Newsletter::create([
            'nom_prenom' => $request->nom_prenom_newsletter,
            'email' => $request->newsletter_email,
        ]);

        return redirect()->back()->with('success', 'Demande effectuée avec succès.');
    }


}
