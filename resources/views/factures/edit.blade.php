@extends('layouts.app')

@section('content')
<h1>Modifier la facture</h1>

<form action="{{ route('factures.update', $facture->id) }}" method="POST">
    @csrf
    @method('PUT') <!-- Indique à Laravel que c'est une mise à jour -->

    <div class="mb-3">
        <label>Numéro :</label>
        <input type="text" name="numero" class="form-control" value="{{ old('numero', $facture->numero) }}" required>
    </div>

    <div class="mb-3">
        <label>Client :</label>
        <input type="text" name="client" class="form-control" value="{{ old('client', $facture->client) }}" required>
    </div>

    <div class="mb-3">
        <label>Total :</label>
        <input type="number" step="0.01" name="total" class="form-control" value="{{ old('total', $facture->total) }}" required>
    </div>

    <div class="mb-3">
        <label>Statut :</label>
        <select name="statut" class="form-control">
            <option value="en attente" @if($facture->statut == 'en attente') selected @endif>En attente</option>
            <option value="payée" @if($facture->statut == 'payée') selected @endif>Payée</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Mettre à jour</button>
</form>
@endsection
