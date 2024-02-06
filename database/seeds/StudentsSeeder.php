<?php

use Illuminate\Database\Seeder;

class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Students')->insert([
            [
                'grade'=> '2',
                'name'=> 'Bob',
                'addres'=> '福岡県福岡市博多区',
                'img_path'=> 'パスが入る',
                'comment'=> 'サークル所属',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
            ],

            [
                'grade'=> '1',
                'name'=> 'Kate',
                'addres'=> '福岡県福岡市東区',
                'img_path'=> 'パスが入る',
                'comment'=> 'サークル無所属',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
            ],

            [
                'grade'=> '3',
                'name'=> 'Ari',
                'addres'=> '福岡県福岡市西区',
                'img_path'=> 'パスが入る',
                'comment'=> 'サークル無所属',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
            ],
        ]);

    }
}
