<?php

use Illuminate\Database\Seeder;

class OrganizationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Organization::class, 10)->create()->each(function ($org) {
            $org->users()->saveMany(factory(App\User::class, 5)->make());
        });
    }
}
