<?php
namespace App\Http\Controllers;

use App\Models\Chantier;
use Illuminate\Http\Request;

class ChantierController extends Controller
{
    // Afficher la liste des chantiers
    public function index()
    {
        $chantiers = Chantier::orderBy('created_at', 'desc')->paginate(10);
        return view('chantiers.index', compact('chantiers'));
    }

    // Formulaire de création
    public function create()
    {
        return view('chantiers.create');
    }

    // Enregistrer un nouveau chantier
    public function store(Request $request)
    {
        $donneesValidees = $request->validate([
            'nom' => 'required|string|max:255',
            'client' => 'required|string|max:255',
            'budget_initial' => 'required|numeric|min:0',
            'date_debut' => 'required|date',
            'date_fin_prevue' => 'nullable|date|after_or_equal:date_debut',
            'statut' => 'required|in:en_attente,en_cours,suspendu,termine',
            'avancement_pourcentage' => 'required|integer|between:0,100',
        ]);

        Chantier::create($donneesValidees);

        return redirect()->route('chantiers.index')->with('succes', 'Chantier créé avec succès !');
    }

    // Formulaire de modification
    public function edit(Chantier $chantier)
    {
        return view('chantiers.edit', compact('chantier'));
    }

    // Mettre à jour le chantier
    public function update(Request $request, Chantier $chantier)
    {
        $donneesValidees = $request->validate([
            'nom' => 'required|string|max:255',
            'client' => 'required|string|max:255',
            'budget_initial' => 'required|numeric|min:0',
            'date_debut' => 'required|date',
            'date_fin_prevue' => 'nullable|date|after_or_equal:date_debut',
            'statut' => 'required|in:en_attente,en_cours,suspendu,termine',
            'avancement_pourcentage' => 'required|integer|between:0,100',
        ]);

        $chantier->update($donneesValidees);

        return redirect()->route('chantiers.index')->with('succes', 'Chantier mis à jour avec succès !');
    }

    // Supprimer le chantier
    public function destroy(Chantier $chantier)
    {
        $chantier->delete();
        return redirect()->route('chantiers.index')->with('succes', 'Chantier supprimé avec succès !');
    }
}