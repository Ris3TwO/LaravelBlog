<?php

use App\User;
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
        User::truncate();

        $user = new User;
        $user->name = 'Daniel Rodriguez';
        $user->biography = 'Esta es una breve biografía de prueba';
        $user->email = 'ris3two@gmail.com';
        $user->password = bcrypt('123123');
        $user->save();

        $user = new User;
        $user->name = 'Yaremí Mendoza';
        $user->biography = 'Esta es una breve biografía de prueba';
        $user->email = 'mendozayaremi671@gmail.com';
        $user->password = bcrypt('123123');
        $user->save();
    }
}
