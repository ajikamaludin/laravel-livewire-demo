<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('CREATE EXTENSION IF NOT EXISTS "uuid-ossp"');
        Schema::create('links', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('name');
            $table->string('code');
            $table->text('real_link');
            $table->integer('visit_count')->default(0);
            $table->timestamp('last_visited_at')->nullable();

            $table->integer('user_id')->constrained()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('links');
    }
}
