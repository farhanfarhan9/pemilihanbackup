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
        factory(App\Organization::class, 50)->create()->each(function ($org) {
            $org->users()->saveMany(factory(App\User::class, 100)->make());
        });
    }
}
