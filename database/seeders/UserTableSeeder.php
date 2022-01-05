<?php

// namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Nette\Utils\Random;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Models\User2::create([
            'name'=>sprintf('%s %s', Str::random(3), Str::random(4)),
            'email'=>Str::random(10).'@abc.com',
            'password'=>bcrypt('password')
        ]);
    }
}
