<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Menu;
use Illuminate\Support\Facades\Schema;


class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::withoutForeignKeyConstraints(function () {
            //Trip::truncate();
            Menu::truncate();
        });

        Menu::insert(
            [
                [
                    'restaurant_id' => '1', 'meal_id' => '1',
                ],
                [
                    'restaurant_id' => '1', 'meal_id' => '2',
                ],
                [
                    'restaurant_id' => '1', 'meal_id' => '3',
                ],
                [
                    'restaurant_id' => '2', 'meal_id' => '4',
                ],
                [
                    'restaurant_id' => '2', 'meal_id' => '5',
                ],
                [
                    'restaurant_id' => '2', 'meal_id' => '6',
                ],
                [
                    'restaurant_id' => '3', 'meal_id' => '7',
                ],
                [
                    'restaurant_id' => '3', 'meal_id' => '8',
                ],
                [
                    'restaurant_id' => '3', 'meal_id' => '9',
                ],
                [
                    'restaurant_id' => '4', 'meal_id' => '10',
                ],
                [
                    'restaurant_id' => '4', 'meal_id' => '11',
                ],
                [
                    'restaurant_id' => '4', 'meal_id' => '12',
                ],
                [
                    'restaurant_id' => '5', 'meal_id' => '13',
                ],
                [
                    'restaurant_id' => '5', 'meal_id' => '14',
                ],
                [
                    'restaurant_id' => '5', 'meal_id' => '15',
                ],
                [
                    'restaurant_id' => '6', 'meal_id' => '16',
                ],
                [
                    'restaurant_id' => '6', 'meal_id' => '17',
                ],
                [
                    'restaurant_id' => '6', 'meal_id' => '18',
                ],
                [
                    'restaurant_id' => '7', 'meal_id' => '19',
                ],
                [
                    'restaurant_id' => '7', 'meal_id' => '20',
                ],
                [
                    'restaurant_id' => '7', 'meal_id' => '21',
                ],
                [
                    'restaurant_id' => '8', 'meal_id' => '22',
                ],
                [
                    'restaurant_id' => '8', 'meal_id' => '23',
                ],
                [
                    'restaurant_id' => '8', 'meal_id' => '24',
                ],
                [
                    'restaurant_id' => '9', 'meal_id' => '25',
                ],
                [
                    'restaurant_id' => '9', 'meal_id' => '26',
                ],
                [
                    'restaurant_id' => '9', 'meal_id' => '27',
                ],
            ]
        );
    }
}
