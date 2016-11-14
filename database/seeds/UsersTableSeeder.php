<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create the Default Users
        User::updateOrCreate(['username' => config('auth.defaults.user.username')], [
        	'name'     => 'Administrator',
        	'username' => config('auth.defaults.user.username'),
        	'password' => bcrypt(config('auth.defaults.user.password'))
        ]);
    }
}
