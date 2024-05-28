<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Schema;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::withoutForeignKeyConstraints(function () {
            //Trip::truncate();
            Restaurant::truncate();
        });

        Restaurant::insert(
            [
                [
                    'name' => 'Restauracja Stary Browar Rzeszowski', 'address' => 'Rynek 20-23, 35-064 Rzeszów', 'stars' => '4.5', 'price' => '45', 'img' => 'Stary Browar.jpg', 'description' => 'Tradycyjne polskie dania, piwa rzemieślnicze warzone na miejscu.',
                ],
                [
                    'name' => 'Karczma Wacławówka', 'address' => 'ul. 3 Maja 28, 35-030 Rzeszów', 'stars' => '4.4', 'price' => '37.50', 'img' => 'Karczma Wacławówka.jpg', 'description' => 'Regionalne potrawy z Podkarpacia, dania mięsne.',
                ],
                [
                    'name' => 'Restauracja Łemko', 'address' => 'ul. Dymnickiego 1, 35-030 Rzeszów', 'stars' => '4.3', 'price' => '30', 'img' => 'Restauracja Łemko.jpg', 'description' => 'Tradycyjne dania kuchni łemkowskiej i polskiej.',
                ],
                [
                    'name' => 'Pizzeria Grota', 'address' => ' ul. Grunwaldzka 4, 35-068 Rzeszów', 'stars' => '4.4', 'price' => '30', 'img' => 'grota.jpg', 'description' => 'Pizza na cienkim cieście, dania z makaronem.',
                ],
                [
                    'name' => 'Ristorante Bellanuna', 'address' => ' ul. Rejtana 65, 35-326 Rzeszów', 'stars' => '4.5', 'price' => '60', 'img' => 'Bellanuna.jpeg', 'description' => 'Autentyczne włoskie potrawy, świeże makarony, owoce morza.',
                ],
                [
                    'name' => 'Restauracja Vinci', 'address' => 'ul. Dąbrowskiego 17, 35-033 Rzeszów', 'stars' => '4.3', 'price' => '45', 'img' => 'Vinci.jpg', 'description' => 'Włoskie klasyki, pizza, desery.',
                ],
                [
                    'name' => 'Sushi World', 'address' => 'ul. Matejki 8, 35-064 Rzeszów', 'stars' => '4.6', 'price' => '75', 'img' => 'SushiWorld.jpg', 'description' => 'Sushi, sashimi, dania kuchni japońskiej.',
                ],
                [
                    'name' => 'Kuchnia Orientalna Hai Ha', 'address' => 'ul. Rejtana 65, 35-326 Rzeszów', 'stars' => '4.2', 'price' => '30', 'img' => 'hai ha.jpg', 'description' => 'Potrawy kuchni wietnamskiej i chińskiej, pho, spring rolls.',
                ],
                [
                    'name' => 'Restauracja Zen Thai', 'address' => 'ul. Targowa 11, 35-064 Rzeszów', 'stars' => '4.5', 'price' => '55', 'img' => 'zen thai.jpeg', 'description' => 'Kuchnia tajska, curry, dania z krewetkami.',
                ],
            ]
        );
    }
}
