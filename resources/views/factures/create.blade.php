@extends('layouts.app')

@section('content')
<h1>Ajouter une facture</h1>

<form action="{{ route('factures.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Numéro :</label>
        <input type="text" name="numero" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Client :</label>
        <input type="text" name="client" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Total :</label>
        <input type="number" step="0.01" name="total" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Statut :</label>
        <select name="statut" class="form-control">
            <option value="en attente">En attente</option>
            <option value="payée">Payée</option>
        </select>
    </div>
    <button type="submit" class="btn btn-success">Ajouter</button>
</form>
@endsection
