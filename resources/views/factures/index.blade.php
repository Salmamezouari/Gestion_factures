@extends('layouts.app')

@section('content')
<h1 class="mb-4">Liste des factures</h1>

<a href="{{ route('factures.create') }}" class="btn btn-primary mb-3">Ajouter une facture</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Numéro</th>
            <th>Client</th>
            <th>Total</th>
            <th>Statut</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($factures as $facture)
            <tr>
                <td>{{ $facture->numero }}</td>
                <td>{{ $facture->client }}</td>
                <td>{{ $facture->total }}</td>
                <td>{{ $facture->statut }}</td>
                <td>
                    <a href="{{ route('factures.edit', $facture->id) }}" class="btn btn-sm btn-warning">Modifier</a>
                    <form action="{{ route('factures.destroy', $facture->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<h3>Total global : {{ $totalGlobal }}</h3>
@endsection
