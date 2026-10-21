@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm col-md-8 offset-md-2 p-0">
        <div class="card-header bg-info text-white">
            <h4 class="mb-0">Modifier le Chantier</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('chantiers.update', $chantier->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Nom du Chantier *</label>
                    <input type="text" name="nom" class="form-control" value="{{ old('nom', $chantier->nom) }}" required>
                </div>
                <div class="form-group">
                    <label>Client *</label>
                    <input type="text" name="client" class="form-control" value="{{ old('client', $chantier->client) }}" required>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Budget Initial (FCFA) *</label>
                        <input type="number" step="0.01" name="budget_initial" class="form-control" value="{{ old('budget_initial', $chantier->budget_initial) }}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Statut *</label>
                        <select name="statut" class="form-control">
                            <option value="en_cours" {{ $chantier->statut == 'en_cours' ? 'selected' : '' }}>En cours</option>
                            <option value="en_attente" {{ $chantier->statut == 'en_attente' ? 'selected' : '' }}>En attente</option>
                            <option value="suspendu" {{ $chantier->statut == 'suspendu' ? 'selected' : '' }}>Suspendu</option>
                            <option value="termine" {{ $chantier->statut == 'termine' ? 'selected' : '' }}>Terminé</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Date de Début *</label>
                        <input type="date" name="date_debut" class="form-control" value="{{ old('date_debut', $chantier->date_debut) }}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Date de Fin Prévue</label>
                        <input type="date" name="date_fin_prevue" class="form-control" value="{{ old('date_fin_prevue', $chantier->date_fin_prevue) }}">
                    </div>
                </div>
                <div class="form-group">
                    <label>Avancement (%)</label>
                    <input type="number" min="0" max="100" name="avancement_pourcentage" class="form-control" value="{{ old('avancement_pourcentage', $chantier->avancement_pourcentage) }}">
                </div>
                <a href="{{ route('chantiers.index') }}" class="btn btn-secondary">Annuler</a>
                <button type="submit" class="btn btn-primary">Mettre à jour</button>
            </form>
        </div>
    </div>
</div>
@endsection