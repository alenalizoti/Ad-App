<?php

namespace Database\Seeders;

use App\Models\Ad;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ads = [
            [
                'title' => 'Dell XPS 13',
                'description' => 'Polovan laptop u odličnom stanju, i7 procesor, 16GB RAM.',
                'price' => 800.00,
                'condition' => 'polovno',
                'image_path' => 'Dell_XPS_13.jpg',
                'contact_phone' => '0601234567',
                'location' => 'Novi Sad',
                'category_id' => 5, 
                'user_id' => 2,
            ],
            [
                'title' => 'iphone 13 Pro',
                'description' => 'Telefon star 6 meseci, kao nov. Bez ogrebotina.',
                'price' => 900.00,
                'condition' => 'polovno',
                'image_path' => 'iphone_13_Pro.jpg',
                'contact_phone' => '0612345678',
                'location' => 'Beograd',
                'category_id' => 8, 
                'user_id' => 3,
            ],
            [
                'title' => 'AMD Ryzen 7 5800X',
                'description' => 'Potpuno nov, fabricko pakovanje.',
                'price' => 320.00,
                'condition' => 'novo',
                'image_path' => 'AMD_Ryzen_7_5800X.jpg',
                'contact_phone' => '0623456789',
                'location' => 'Niš',
                'category_id' => 7, 
                'user_id' => 2,
            ],
            [
                'title' => 'Volkswagen Golf 6',
                'description' => '2009. godište, 1.9 TDI, registrovan do kraja godine.',
                'price' => 4500.00,
                'condition' => 'polovno',
                'image_path' => 'Volkswagen_Golf_6.jpg',
                'contact_phone' => '0609876543',
                'location' => 'Subotica',
                'category_id' => 10, 
                'user_id' => 4,
            ],
            [
                'title' => 'ASUS RTX 3060',
                'description' => 'Korišćena za gaming, nije rudarena.',
                'price' => 350.00,
                'condition' => 'polovno',
                'image_path' => 'ASUS_RTX_3060.jpg',
                'contact_phone' => '0611122233',
                'location' => 'Kragujevac',
                'category_id' => 6, 
                'user_id' => 2,
            ],
            [
                'title' => 'HP DDR4 16GB RAM',
                'description' => 'Nova, fabrički upakovana.',
                'price' => 60.00,
                'condition' => 'novo',
                'image_path' => 'HP DDR4_16GB_RAM.jpg',
                'contact_phone' => '0643322110',
                'location' => 'Pančevo',
                'category_id' => 8, 
                'user_id' => 3,
            ],
            [
                'title' => 'Samsung Galaxy_S22',
                'description' => 'Kupljen pre mesec dana, bez oštećenja.',
                'price' => 700.00,
                'condition' => 'polovno',
                'image_path' => 'Samsung_Galaxy_S22.jpg',
                'contact_phone' => '0639998888',
                'location' => 'Zrenjanin',
                'category_id' => 8, 
                'user_id' => 4,
            ],
            [
                'title' => 'Yamaha R6',
                'description' => '2007. godište, servisiran, spreman za sezonu.',
                'condition' => 'polovno',
                'image_path' => 'Yamaha_R6.jpg',
                'contact_phone' => '0652233445',
                'location' => 'Čačak',
                'category_id' => 11, 
                'user_id' => 3,
            ],
            [
                'title' => 'Fiksni telefon Panasonic',
                'description' => 'Ispravan, sa bazom i punjačem.',
                'price' => 25.00,
                'condition' => 'polovno',
                'image_path' => 'Fiksni_telefon_Panasonic.jpg',
                'contact_phone' => '0605544332',
                'location' => 'Vranje',
                'category_id' => 9, 
                'user_id' => 2,
            ],
            [
                'title' => 'Lenovo ThinkPad T14',
                'description' => 'Odličan poslovni laptop, i5, 16GB RAM.',
                'price' => 600.00,
                'condition' => 'polovno',
                'image_path' => 'Lenovo_ThinkPad_T14.jpg',
                'contact_phone' => '0664455667',
                'location' => 'Kruševac',
                'category_id' => 5, 
                'user_id' => 4,
            ],
        ];

        foreach($ads as $ad){
            Ad::create($ad);
        }
    }
}
