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
        // Solo se necesita un Schema::table
        Schema::table('eventos', function (Blueprint $table) {
            // El método correcto es encadenar decimal() y unsigned()
            $table->decimal('horas_asignadas', 4, 2)->unsigned()->nullable()->after('max_participantes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Aquí se define cómo revertir el cambio
        Schema::table('eventos', function (Blueprint $table) {
            $table->dropColumn('horas_asignadas');
        });
    }
};