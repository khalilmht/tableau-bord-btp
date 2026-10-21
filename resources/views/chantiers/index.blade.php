@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><i class="fas fa-building text-primary mr-2"></i>Gestion des Chantiers</h2>
        <a href="{{ route('chantiers.create') }}" class="btn btn-primary">
            <i class="fas fa-plus mr-1"></i> Nouveau Chantier
        </a>
    </div>

    @if(session('succes'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('succes') }}
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th>Nom du Chantier</th>
                        <th>Client</th>
                        <th>Budget</th>
                        <th>Avancement</th>
                        <th>Statut</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($chantiers as $chantier)
                        <tr>
                            <td class="font-weight-bold">{{ $chantier->nom }}</td>
                            <td>{{ $chantier->client }}</td>
                            <td>{{ number_format($chantier->budget_initial, 0, ',', ' ') }} FCFA</td>
                            <td>
                                <div class="progress" style="height: 18px;">
                                    <div class="progress-bar bg-info" style="width: {{ $chantier->avancement_pourcentage }}%;">
                                        {{ $chantier->avancement_pourcentage }}%
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="badge badge-primary">{{ ucfirst($chantier->statut) }}</span>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('chantiers.edit', $chantier->id) }}" class="btn btn-sm btn-outline-info">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('chantiers.destroy', $chantier->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Confirmer la suppression ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-muted">Aucun chantier enregistré.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer bg-white">
            {{ $chantiers->links() }}
        </div>
    </div>
</div>
@endsection