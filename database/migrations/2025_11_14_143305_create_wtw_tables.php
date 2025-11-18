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
        $table->string('imdb_id', 256);
        $table->string('title', 256);
        $table->string('title_original', 256);
        $table->timestamp('year');
        $table->timestamps();
      });

      Schema::create('serials_votes', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('serial_id');
        $table->foreign('serial_id')->references('id')->on('serials')->onDelete('cascade')->onUpdate('cascade');
        $table->unsignedBigInteger('user_id');
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        $table->integer('vote');
        $table->timestamps();
      });

      Schema::create('genres', function (Blueprint $table) {
        $table->id();
        $table->string('imdb_id', 256);
        $table->string('title', 256);
        $table->timestamps();
      });

      Schema::create('genre_serial', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('serial_id');
        $table->foreign('serial_id')->references('id')->on('serials')->onDelete('cascade')->onUpdate('cascade');
        $table->unsignedBigInteger('genre_id');
        $table->foreign('genre_id')->references('id')->on('genres')->onDelete('cascade')->onUpdate('cascade');
        $table->timestamps();
      });

      Schema::create('seasons', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('serial_id');
        $table->foreign('serial_id')->references('id')->on('serials')->onDelete('cascade')->onUpdate('cascade');
        $table->integer('number');
        $table->timestamps();
      });

      Schema::create('episodes', function (Blueprint $table) {
        $table->id();
        $table->string('title', 256);
        $table->unsignedBigInteger('serial_id');
        $table->foreign('serial_id')->references('id')->on('serials')->onDelete('cascade')->onUpdate('cascade');
        $table->unsignedBigInteger('season_id');
        $table->integer('number');
        $table->timestamp('air_date');
        $table->timestamps();
      });

      Schema::create('comments', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('episode_id');
        $table->foreign('episode_id')->references('id')->on('episodes')->onDelete('cascade')->onUpdate('cascade');
        $table->unsignedBigInteger('user_id');
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        $table->text('description');
        $table->unsignedBigInteger('parent_id')->nullable();
        $table->timestamps();
      });

      Schema::create('serials_watched', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id');
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        $table->unsignedBigInteger('serial_id');
        $table->foreign('serial_id')->references('id')->on('serials')->onDelete('cascade')->onUpdate('cascade');
        $table->timestamps();
      });

      Schema::create('episodes_watched', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id');
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        $table->unsignedBigInteger('serial_id');
        $table->foreign('serial_id')->references('id')->on('serials')->onDelete('cascade')->onUpdate('cascade');
        $table->unsignedBigInteger('episode_id');
        $table->foreign('episode_id')->references('id')->on('episodes')->onDelete('cascade')->onUpdate('cascade');
        $table->timestamps();
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
