<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $computers = Category::create(['name' => 'Racunari']);
        $phones = Category::create(['name' => 'Telefoni']);
        $vehicles = Category::create(['name' => 'Vozila']);

        $components = Category::create(attributes: ['name' => 'Komponente', 'parent_id' => $computers->id]);
        $laptops = Category::create(['name' => 'Laptopovi', 'parent_id' => $computers->id]);

        Category::create(['name' => 'Graficke kartice', 'parent_id' => $components->id]);
        Category::create(['name' => 'Procesori', 'parent_id' => $components->id]);
        Category::create(['name' => 'Memorije', 'parent_id' => $components->id]);

        Category::create(['name' => 'Pametni telefoni', 'parent_id' => $phones->id]);
        Category::create(['name' => 'Fiksni telefoni', 'parent_id' => $phones->id]);

        Category::create(['name' => 'Automobili', 'parent_id' => $vehicles->id]);
        Category::create(['name' => 'Motocikli', 'parent_id' => $vehicles->id]);
    }
}
