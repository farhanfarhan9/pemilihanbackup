<?php

use Illuminate\Database\Seeder;

class OrganizationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Organization::class, 2)->create()->each(function ($org) {
            $org->users()->saveMany(factory(App\User::class, 5)->make());
            $org->elections()->saveMany(factory(App\Election::class, 5)->make());
            $org->voters()->saveMany(factory(App\Voter::class, 1000)->make());
        });
    }
}
