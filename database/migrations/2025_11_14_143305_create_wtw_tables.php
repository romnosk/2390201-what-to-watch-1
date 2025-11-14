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
      Schema::table('users', function (Blueprint $table) {
        $table->string('avatar', 256)->nullable();
      });

      Schema::create('serials', function (Blueprint $table) {
        $table->id();
        $table->integer('imdb_id')->nullable(false);
        $table->string('title', 256)->nullable(false);
        $table->string('title_original', 256)->nullable(false);
        $table->timestamp('year')->nullable(false);
      });

      Schema::create('serials_votes', function (Blueprint $table) {
        $table->id();
        $table->integer('serial_id')->nullable(false);
        $table->integer('user_id')->nullable(false);
        $table->integer('vote')->nullable(false);
      });

      Schema::create('genres', function (Blueprint $table) {
        $table->id();
        $table->integer('imdb_id')->nullable(false);
        $table->string('title', 256)->nullable(false);
      });

      Schema::create('genre_serial', function (Blueprint $table) {
        $table->id();
        $table->integer('serial_id')->nullable(false);
        $table->integer('genre_id')->nullable(false);
      });

      Schema::create('seasons', function (Blueprint $table) {
        $table->id();
        $table->integer('serial_id')->nullable(false);
        $table->integer('number')->nullable(false);
      });

      Schema::create('episodes', function (Blueprint $table) {
        $table->id();
        $table->string('title', 256)->nullable(false);
        $table->integer('serial_id')->nullable(false);
        $table->integer('season_id')->nullable(false);
        $table->integer('number')->nullable(false);
        $table->timestamp('air_date')->nullable(false);
      });

      Schema::create('comments', function (Blueprint $table) {
        $table->id();
        $table->integer('episode_id')->nullable(false);
        $table->integer('user_id')->nullable(false);
        $table->text('description')->nullable(false);
        $table->integer('parent_id')->nullable();
        $table->timestamp('created_at')->nullable(false);
      });

      Schema::create('serials_watched', function (Blueprint $table) {
        $table->id();
        $table->integer('user_id')->nullable(false);
        $table->integer('serial_id')->nullable(false);
      });

      Schema::create('episodes_watched', function (Blueprint $table) {
        $table->id();
        $table->integer('user_id')->nullable(false);
        $table->integer('serial_id')->nullable(false);
        $table->integer('episode_id')->nullable(false);
      });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
      Schema::dropIfExists('episodes_watched');
      Schema::dropIfExists('serials_watched');
      Schema::dropIfExists('comments');
      Schema::dropIfExists('episodes');
      Schema::dropIfExists('seasons');
      Schema::dropIfExists('genre_serial');
      Schema::dropIfExists('genres');
      Schema::dropIfExists('serials_votes');
      Schema::dropIfExists('serials');
      Schema::table('users', function (Blueprint $table) {
        $table->dropColumn('avatar');
      });
    }
  };
