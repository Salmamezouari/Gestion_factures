<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use Illuminate\Http\Request;

class FactureController extends Controller
{
    // Liste toutes les factures
    public function index()
    {
        $factures = Facture::all();
        $totalGlobal = $factures->sum('total');
        return view('factures.index', compact('factures', 'totalGlobal'));
    }

    // Formulaire pour créer une facture
    public function create()
    {
        return view('factures.create');
    }

    // Enregistrer la nouvelle facture
    public function store(Request $request)
    {
        $request->validate([
            'numero' => 'required|unique:factures',
            'client' => 'required',
            'total' => 'required|numeric',
            'statut' => 'required|in:payée,en attente',
        ]);

        Facture::create($request->all());

        return redirect()->route('factures.index')->with('success', 'Facture ajoutée !');
    }

    // Formulaire pour éditer une facture
    public function edit(Facture $facture)
    {
        return view('factures.edit', compact('facture'));
    }

    // Mettre à jour une facture
    public function update(Request $request, Facture $facture)
    {
        $request->validate([
            'numero' => 'required|unique:factures,numero,' . $facture->id,
            'client' => 'required',
            'total' => 'required|numeric',
            'statut' => 'required|in:payée,en attente',
        ]);

        $facture->update($request->all());

        return redirect()->route('factures.index')->with('success', 'Facture mise à jour !');
    }

    // Supprimer une facture
    public function destroy(Facture $facture)
    {
        $facture->delete();
        return redirect()->route('factures.index')->with('success', 'Facture supprimée !');
    }
}
