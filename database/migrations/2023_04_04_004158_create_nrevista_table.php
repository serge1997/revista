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
        Schema::create('nrevista', function (Blueprint $table) {
            $table->increments('id');
            $table->string("titulo");
            $table->string("area");
            $table->string("resumo");
            $table->text("revista");
            $table->integer("autor_id")->unsigned();
            $table->foreign("autor_id")->references("id")
                ->on("usuarios")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nrevista');
    }
};
