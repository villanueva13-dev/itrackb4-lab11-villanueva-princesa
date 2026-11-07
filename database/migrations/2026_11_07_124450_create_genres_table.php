
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Create the genres lookup table
        Schema::create('genres', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });

        // 2. Remove the old genre text column
        Schema::table('books', function (Blueprint $table) {
            $table->dropColumn('genre');
        });

        // 3. Add the genre foreign key
        Schema::table('books', function (Blueprint $table) {
            $table->foreignId('genre_id')->constrained();
        });
    }

    public function down(): void
    {
        // Reverse the foreign key operation
        Schema::table('books', function (Blueprint $table) {
            $table->dropConstrainedForeignId('genre_id');
        });

        // Restore the old genre column
        Schema::table('books', function (Blueprint $table) {
            $table->string('genre');
        });

        // Drop the lookup table
        Schema::dropIfExists('genres');
    }
};
