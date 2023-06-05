<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Altavoz;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    { //esto es lo q ejecuta con el comando
         \App\Models\User::factory(10)->create();
         \App\Models\Altavoces::factory()->count(10)->create();

    }
}
