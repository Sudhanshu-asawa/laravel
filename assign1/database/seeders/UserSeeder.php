<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('tasks')->insert([
            'name' => 'Sudhanshu',
            'age' => 21,
            'salary' => 10000,
        ]);

        // \App\Models\User::factory(10)->create();
    }
}
