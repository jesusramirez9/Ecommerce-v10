<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Storage::deleteDirectory('products');
        Storage::makeDirectory('products');    

        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Jesus ramirez',
            'email' => 'jesus.ramirez9@unmsm.edu.pe',
            'password' => bcrypt('1234')
        ]);

        $this->call([
            FamilySeeder::class,
            OptionSeeder::class,
        ]);

        
        Product::factory(150)->create();
    }
}