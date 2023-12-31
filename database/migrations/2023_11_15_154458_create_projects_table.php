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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id");
            $table->string("project_title");
            $table->dateTime("deadline")->nullable()->comment('Крайний срок');
            $table->text("description");
            $table->enum("status", ['В прогрессе', 'Завершено', 'Просрочено'])->default('В прогрессе');
            $table->enum("priority", ['Нормальный', 'Срочно'])->default('Нормальный');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
