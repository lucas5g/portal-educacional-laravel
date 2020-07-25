<?php

use Illuminate\Database\Seeder;

class DisciplineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('disciplines')->insert([
            'title' => 'Matemática EM3',
            'description' => 'Matemática 3° Série',
            'course_id' => '3',
            'teacher_id' => '1',
            'created_at' => date('Y-m-d H:i'),
            'updated_at' => date('Y-m-d H:i'),
        ]);
        DB::table('disciplines')->insert([
            'title' => 'Português EM3',
            'description' => 'Português 3° Série',
            'course_id' => '3',
            'teacher_id' => '2',
            'created_at' => date('Y-m-d H:i'),
            'updated_at' => date('Y-m-d H:i'),
        ]);
    }
}
