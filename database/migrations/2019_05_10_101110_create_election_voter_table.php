<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElectionVoterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('election_voter', function (Blueprint $table) {
            // $table->bigIncrements('id');
            $table->primary(['election_id', 'voter_id']);
            $table->unsignedBigInteger('election_id');
            $table->unsignedBigInteger('voter_id');
            $table->boolean('status');
            $table->timestamps();

            $table->foreign('election_id')
                  ->references('id')
                  ->on('elections')
                  ->onDelete('cascade');

            $table->foreign('voter_id')
                  ->references('id')
                  ->on('voters')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('election_voter');
    }
}
