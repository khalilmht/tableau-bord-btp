<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up(): void
{
    Schema::create('chantiers', function (Blueprint $table) {
        $table->id();
        $table->string('nom');
        $table->string('client');
        $table->decimal('budget_initial', 15, 2);
        $table->date('date_debut');
        $table->date('date_fin_prevue')->nullable();
        $table->enum('statut', ['en_attente', 'en_cours', 'suspendu', 'termine'])->default('en_cours');
        $table->integer('avancement_pourcentage')->default(0); // De 0 à 100%
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chantiers');
    }
};
