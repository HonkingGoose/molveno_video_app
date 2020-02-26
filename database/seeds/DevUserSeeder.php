<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

/**
 * Seed the database with development only accounts.
 * Accounts are used for testing purposes only.
 * Exclude seeder from production environments.
 */
class DevUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hans = new \App\User();
        $hans->name = "Hans";
        $hans->email = "hans@molveno.com";
        $hans->password = Hash::make("hans123");
        $hans->save();

        $noelle = new \App\User();
        $noelle->name = "Noelle";
        $noelle->email = "noelle@molveno.com";
        $noelle->password = Hash::make("noelle123");
        $noelle->save();
    }
}
