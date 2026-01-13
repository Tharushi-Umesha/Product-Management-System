<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductCategory;

class ProductCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Electronics', 'active' => true],
            ['name' => 'Clothing', 'active' => true],
            ['name' => 'Food & Beverages', 'active' => true],
            ['name' => 'Books', 'active' => true],
            ['name' => 'Furniture', 'active' => true],
        ];

        foreach ($categories as $category) {
            ProductCategory::create($category);
        }
    }
}
