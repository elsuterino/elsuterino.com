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

            $table->string('provider');
            $table->string('provider_id');

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

            $table->unique(['provider', 'provider_id']);
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
