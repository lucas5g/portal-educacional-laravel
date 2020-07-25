<?php

use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses')->insert([
            'title' => '1° Série',
            'description' => '1° Série do Ensino Médio | 2020',
            'date_start' => '2020-02-02',
            'date_end' => '2020-02-02',
            'created_at' => date('Y-m-d H:i'),
            'updated_at' => date('Y-m-d H:i'),
        ]);
        DB::table('courses')->insert([
            'title' => '2° Série',
            'description' => '2° Série do Ensino Médio | 2020',
            'date_start' => '2020-02-02',
            'date_end' => '2020-02-02',
            'created_at' => date('Y-m-d H:i'),
            'updated_at' => date('Y-m-d H:i'),
        ]);
        DB::table('courses')->insert([
            'title' => '3° Série',
            'description' => '3° Série do Ensino Médio | 2020',
            'date_start' => '2020-02-02',
            'date_end' => '2020-02-02',
            'created_at' => date('Y-m-d H:i'),
            'updated_at' => date('Y-m-d H:i'),
        ]);
    }
}
