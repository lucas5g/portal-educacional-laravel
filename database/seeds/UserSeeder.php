<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Lucas de sousa Assunção',
            'email' => 'lucasdesousa19@hotmail.com',
            'password' => Hash::make('123'),
            'date_birth' => '2000-05-05',
            'profile' => 'teacher',
            'created_at' => date('Y-m-d H:i'),
            'updated_at' => date('Y-m-d H:i'),
        ]);
        DB::table('users')->insert([
            'name' => 'aluno 1',
            'email' => 'aluno1@hotmail.com',
            'password' => Hash::make('123'),
            'date_birth' => '2000-05-05',
            'profile' => 'student',
            'created_at' => date('Y-m-d H:i'),
            'updated_at' => date('Y-m-d H:i'),
        ]);
        DB::table('users')->insert([
            'name' => 'aluno 2',
            'email' => 'aluno2@hotmail.com',
            'password' => Hash::make('123'),
            'date_birth' => '2000-05-05',
            'profile' => 'student',
            'created_at' => date('Y-m-d H:i'),
            'updated_at' => date('Y-m-d H:i'),
        ]);
    }
}
