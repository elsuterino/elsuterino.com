<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('provider_id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('company')->nullable();
            $table->string('salary')->nullable();
            $table->string('salary_per_hour')->nullable();
            $table->string('url');
            $table->string('location')->nullable();
            $table->string('logo')->nullable();
            $table->json('tags')->nullable();
            $table->timestamps();

            $table->unique(['url', 'provider_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
