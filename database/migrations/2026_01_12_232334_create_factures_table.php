<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('factures', function (Blueprint $table) {
            $table->id(); // ID unique de la facture
            $table->string('numero')->unique(); // numéro de facture
            $table->string('client');           // nom du client
            $table->decimal('total', 10, 2);   // montant total
            $table->enum('statut', ['payée', 'en attente'])->default('en attente'); // statut
            $table->timestamps();               // created_at et updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('factures'); // supprime la table si rollback
    }
};
