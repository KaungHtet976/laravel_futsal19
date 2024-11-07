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
        Schema::create('players', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->integer('age');
                $table->integer('back_number');
                $table->decimal('height', 5, 2); // Adjust precision and scale as needed
                $table->decimal('weight', 5, 2); // Adjust precision and scale as needed
                $table->string('position');
                $table->string('dominant_foot');
                $table->foreignId('team_id')->constrained('teams')->onDelete('cascade');
                $table->integer('rating');
                $table->string('profile_photo')->nullable();
                $table->string('cover_photo')->nullable();
                $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('players', function (Blueprint $table) {
            $table->dropColumn(['number', 'cover_photo']);
        });
    }
};
