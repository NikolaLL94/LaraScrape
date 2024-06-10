<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('providers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('mailer', 50);
            $table->string('host', 50);
            $table->string('port');
            $table->string('username', 50);
            $table->string('password', 50);
            $table->string('encryption', 100);
            $table->string('from_address', 100);
            $table->string('from_name', 100);
            $table->boolean('default')->default(0);
            $table->text('webhook_url')->nullable();
            $table->text('webhook_format')->default('json');

            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')
                ->references('id')
                ->on('projects');

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
        Schema::dropIfExists('providers');
    }
}
