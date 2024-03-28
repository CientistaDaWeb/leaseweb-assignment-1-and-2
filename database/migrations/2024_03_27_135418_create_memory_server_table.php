<?php

use App\Models\Memory;
use App\Models\Server;
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
        Schema::create('memory_server', function (Blueprint $table) {
            $table->foreignIdFor(Memory::class);
            $table->foreignIdFor(Server::class);
            $table->timestamps();
            $table->primary(['memory_id', 'server_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('memory_server');
    }
};
