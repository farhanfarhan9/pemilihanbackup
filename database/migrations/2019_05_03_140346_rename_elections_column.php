<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameElectionsColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('elections', function (Blueprint $table) {
            $table->renameColumn("registration_opened_at", "registration_opened_on");
            $table->renameColumn("registration_ends_at", "registration_closed_on");
            $table->renameColumn("voting_starts_at", "voting_starts_on");
            $table->renameColumn("voting_closed_on", "voting_ends_on");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('elections', function (Blueprint $table) {
            $table->renameColumn("registration_opened_on", "registration_opened_at");
            $table->renameColumn("registration_closed_on", "registration_closed_at");
            $table->renameColumn("voting_starts_on", "voting_starts_at");
            $table->renameColumn("voting_ends_on", "voting_closed_on");
        });
    }
}
