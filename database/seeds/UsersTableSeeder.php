<?php

use App\Organization;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $organization = Organization::create([
            'name' => 'KamaruYogiru',
            'shortname' => 'kamaryogi',
            'phone_number' => '081397605069',
        ]);

        $organization->users()->create([
            'name' => 'Pemilihan.id',
            'email' => 'admin@pemilihan.id',
            'email_verified_at' => date('Y-m-d H:i:s'),
            'password' => Hash::make('password'),
        ]);
    }
}
