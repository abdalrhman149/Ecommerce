<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use App\Models\Product;



// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {





      $categories = [
    ['id' => 1,  'name' => 'Electronics'],
    ['id' => 2,  'name' => 'Watches'],
    ['id' => 3,  'name' => 'Clothing'],
    ['id' => 4,  'name' => 'Home Appliances'],
    ['id' => 5,  'name' => 'Books'],
    ['id' => 6,  'name' => 'Toys'],
    ['id' => 7,  'name' => 'Sports & Outdoors'],
    ['id' => 8,  'name' => 'Beauty & Personal Care'],
    ['id' => 9,  'name' => 'Automotive'],
    ['id' => 10, 'name' => 'Furniture'],
    ['id' => 11, 'name' => 'Mobile Phones'],
    ['id' => 12, 'name' => 'Laptops'],
    ['id' => 13, 'name' => 'Cameras'],
    ['id' => 14, 'name' => 'Shoes'],
    ['id' => 15, 'name' => 'Groceries'],
];
     DB::table('categories')->insertOrIgnore(  $categories);

         for ($i=0; $i <50 ; $i++) {
            Product::create([
                   'name'=>'Product'.$i,
                   'description'=>'this is product number'.$i,
                   'price'=>rand(10,100),
                   'quantity'=>rand(1,50),
                    'category_id'=>rand(1,15),


                   ]
            );

         }
    }
}
