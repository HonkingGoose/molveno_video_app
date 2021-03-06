<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {
        if (
            !getenv('MOLVENO_ADMIN_USER') ||
            !getenv('MOLVENO_ADMIN_EMAIL') ||
            !getenv('MOLVENO_ADMIN_PASSWORD')
        ) {
            throw new Exception("Admin variables not provided");
        }

        $admin = new User();
        $admin->name = getenv('MOLVENO_ADMIN_USER');
        $admin->email = getenv('MOLVENO_ADMIN_EMAIL');
        $admin->password = Hash::make(getenv('MOLVENO_ADMIN_PASSWORD'));
        $admin->save();
    }
}
