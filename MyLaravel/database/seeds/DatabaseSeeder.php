<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use  Illuminate\Database\QueryException;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        DB::table('sinhvien')->insert([
'tensv'=>'son',
'lop'=>bcrypt('lop'),
'password'=>bcrypt('matkhau')


        ]);
    }
}
