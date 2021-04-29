<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'Prosperity of the righteous',
            'image' => 'uploads/products/book.png',
            'description' => "Qolor sit amet, consectetuer adipiscing elit, sed diam nonummy
                        nibham liber tempor cum soluta nobis eleifend option congue nihil uarta decima et quinta.
                        Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis.",
            'price' =>  100000
        ]);

        Product::create([
            'name' => 'The day of little beginning',
            'image' => 'uploads/products/book1.png',
            'description' => "Qolor sit amet, consectetuer adipiscing elit, sed diam nonummy
                        nibham liber tempor cum soluta nobis eleifend option congue nihil uarta decima et quinta.
                        Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis.",
            'price' =>  50000
        ]);

        Product::create([
            'name' => 'Power of the Mind',
            'image' => 'uploads/products/book3.png',
            'description' => "Qolor sit amet, consectetuer adipiscing elit, sed diam nonummy
                        nibham liber tempor cum soluta nobis eleifend option congue nihil uarta decima et quinta.
                        Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis.",
            'price' =>  3000
        ]);

        Product::create([
            'name' => 'Holy Spirit My Helper',
            'image' => 'uploads/products/book2.png',
            'description' => "Qolor sit amet, consectetuer adipiscing elit, sed diam nonummy
                        nibham liber tempor cum soluta nobis eleifend option congue nihil uarta decima et quinta.
                        Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis.",
            'price' =>  800000
        ]);
    }
}
