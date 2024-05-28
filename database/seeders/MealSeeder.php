<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Meal;
use Illuminate\Support\Facades\Schema;

class MealSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::withoutForeignKeyConstraints(function () {
            //Trip::truncate();
            Meal::truncate();
        });

        Meal::insert(
            [
                [
                    'name' => 'Żurek staropolski', 'price' => '18', 'category' => 'Polska','img' => 'zurek.jpg',
                ],
                [
                    'name' => 'Kotlet schabowy z kapustą zasmażaną', 'price' => '35', 'category' => 'Polska','img' => 'kotlet.jpg',
                ],
                [
                    'name' => 'Pieczeń wieprzowa w sosie grzybowym', 'price' => '42', 'category' => 'Polska','img' => 'pieczeń.jpg',
                ],
                [
                    'name' => 'Pierogi ruskie', 'price' => '22', 'category' => 'Polska','img' => 'pierogi.jpg',
                ],
                [
                    'name' => 'Kaczka z jabłkami i czerwoną kapustą', 'price' => '45', 'category' => 'Polska','img' => 'kaczka.jpg',
                ],
                [
                    'name' => 'Zrazy wołowe w sosie własnym', 'price' => '38', 'category' => 'Polska','img' => 'zrazy.jpg',
                ],
                [
                    'name' => 'Barszcz czerwony z uszkami', 'price' => '15', 'category' => 'Polska','img' => 'barszcz.jpg',
                ],
                [
                    'name' => 'Placki ziemniaczane po węgiersku', 'price' => '28', 'category' => 'Polska','img' => 'placki.jpg',
                ],
                [
                    'name' => 'Gołąbki w sosie pomidorowym', 'price' => '24', 'category' => 'Polska','img' => 'golabki.jpg',
                ],
                [
                    'name' => 'Margherita', 'price' => '25', 'category' => 'Włoska','img' => 'margherita.jpg',
                ],
                [
                    'name' => 'Pizza Quattro Stagioni', 'price' => '32', 'category' => 'Włoska','img' => 'quattro.jpg',
                ],
                [
                    'name' => 'Spaghetti Carbonara', 'price' => '30', 'category' => 'Włoska','img' => 'carbonara.jpg',
                ],
                [
                    'name' => 'Risotto z owocami morza', 'price' => '55', 'category' => 'Włoska','img' => 'risotto.jpg',
                ],
                [
                    'name' => 'Tagliatelle z truflami', 'price' => '60', 'category' => 'Włoska','img' => 'tagliatelle.jpg',
                ],
                [
                    'name' => 'Tiramisu', 'price' => '20', 'category' => 'Włoska','img' => 'tiramisu.jpg',
                ],
                [
                    'name' => 'Pizza Diavola', 'price' => '35', 'category' => 'Włoska','img' => 'diavola.jpg',
                ],
                [
                    'name' => 'Lasagna bolognese', 'price' => '38', 'category' => 'Włoska','img' => 'lasagna.jpg',
                ],
                [
                    'name' => 'Bruschetta z pomidorami', 'price' => '18', 'category' => 'Włoska','img' => 'bruschetta.jpg',
                ],
                [
                    'name' => 'Zestaw sushi (12 szt.)', 'price' => '60', 'category' => 'Azjatycka','img' => 'sushi.jpg',
                ],
                [
                    'name' => 'Ramen miso', 'price' => '35', 'category' => 'Azjatycka','img' => 'miso.jpg',
                ],
                [
                    'name' => 'Tempura z krewetek', 'price' => '45', 'category' => 'Azjatycka','img' => 'tempura.jpg',
                ],
                [
                    'name' => 'Pho bo', 'price' => '25', 'category' => 'Azjatycka','img' => 'phobo.jpg',
                ],
                [
                    'name' => 'Kurczak w sosie słodko-kwaśnym', 'price' => '28', 'category' => 'Azjatycka','img' => 'kurczak.jpg',
                ],
                [
                    'name' => 'Sajgonki', 'price' => '20', 'category' => 'Azjatycka','img' => 'sajgonki.jpg',
                ],
                [
                    'name' => 'Pad Thai z kurczakiem', 'price' => '40', 'category' => 'Azjatycka','img' => 'padthai.jpg',
                ],
                [
                    'name' => 'Zielone curry z krewetkami', 'price' => '50', 'category' => 'Azjatycka','img' => 'curry.jpg',
                ],
                [
                    'name' => 'Mango sticky rice', 'price' => '22', 'category' => 'Azjatycka','img' => 'mango.jpg',
                ],
            ]
        );
    }
}
