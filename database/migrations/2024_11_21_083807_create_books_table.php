<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->integer('pages')->nullable();
            $table->string('cover_image')->nullable();
            $table->integer("author_id")->unsigned();

            $table->foreign("author_id")->references("id")->on("authors")
                ->onDelete("cascade")->onUpdate("cascade");

            $table->integer("category_id")->unsigned();
            $table->foreign("category_id")->references("id")->on("categories")
                ->onDelete("cascade")->onUpdate("cascade");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book');
    }
};
