<?php

use App\Category;
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
        $cat1 = Category::create([
            'name' => 'Smart Home / Digital Life',
        ]);
        $cat2 = Category::create([
            'name' => 'Smart City / Government',
        ]);
        $cat3 = Category::create([
            'name' => 'Smart Office',
        ]);
        $cat4 = Category::create([
            'name' => 'Smart Health',
        ]);
        $cat5 = Category::create([
            'name' => 'Smart Learning',
        ]);
        $cat6 = Category::create([
            'name' => 'IOT / VR / Robotics / Blockchain Lab',
        ]);

//        smart office
        Product::create([
            'name' => 'Connected Office – Managed Wi-Fi',
            'image' => 'uploads/products/smart-office.jpg',
            'description' => "Qolor sit amet, consectetuer adipiscing elit, sed diam nonummy
                        nibham liber tempor cum soluta nobis eleifend option congue nihil uarta decima et quinta.
                        Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis.",
            'price' =>  100000,
            'category_id' => $cat3->id
        ]);
        Product::create([
            'name' => "Secure Office – Access Security / PC Security / Email-Web Security / Mobile Device Management",
            'image' => 'uploads/products/smart-office.jpg',
            'description' => "Qolor sit amet, consectetuer adipiscing elit, sed diam nonummy
                        nibham liber tempor cum soluta nobis eleifend option congue nihil uarta decima et quinta.
                        Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis.",
            'price' =>  100000,
            'category_id' => $cat3->id
        ]);
        Product::create([
            'name' => "Collaboration – Presence / Messaging / Doc Shares / Intranets / Video – Web Conferencing",
            'image' => 'uploads/products/smart-office.jpg',
            'description' => "Qolor sit amet, consectetuer adipiscing elit, sed diam nonummy
                        nibham liber tempor cum soluta nobis eleifend option congue nihil uarta decima et quinta.
                        Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis.",
            'price' =>  100000,
            'category_id' => $cat3->id
        ]);
        Product::create([
            'name' => "Cloud Center of Excellence – Infrastructure as a Service / Platform as a Service",
            'image' => 'uploads/products/smart-office.jpg',
            'description' => "Qolor sit amet, consectetuer adipiscing elit, sed diam nonummy
                        nibham liber tempor cum soluta nobis eleifend option congue nihil uarta decima et quinta.
                        Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis.",
            'price' =>  100000,
            'category_id' => $cat3->id
        ]);
        Product::create([
            'name' => "Productivity and Line of Business Apps – ERP / CRM / SFA",
            'image' => 'uploads/products/smart-office.jpg',
            'description' => "Qolor sit amet, consectetuer adipiscing elit, sed diam nonummy
                        nibham liber tempor cum soluta nobis eleifend option congue nihil uarta decima et quinta.
                        Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis.",
            'price' =>  100000,
            'category_id' => $cat3->id
        ]);


    }
}
