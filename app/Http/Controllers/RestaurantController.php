<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Http\Requests\StoreRestaurantRequest;
use App\Http\Requests\UpdateRestaurantRequest;
use Illuminate\Support\Facades\Gate;
use App\Models\Menu;
use App\Models\Meal;
use Illuminate\Support\Facades\DB;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $result = $request->input('category');

        $restaurants = Restaurant::all();
        if ($result == 'All') {
            $restaurants = Restaurant::all();
        } else if ($result != null) {
            $meals = Meal::where('category', $result)->get();
            $menuIds = [];

            foreach ($meals as $meal) {
                $menus = Menu::where('meal_id', $meal->id)->get();
                foreach ($menus as $menu) {
                    $menuIds[] = $menu->restaurant_id;
                }
            }

            $restaurants = Restaurant::whereIn('id', $menuIds)->get();
        }

        return view('foodsearch', ['restaurants' => $restaurants]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('restaurant.create');
    }
    public function show(Restaurant $restaurant)
    {

        $menus = Menu::where("restaurant_id", $restaurant->id)->get();
        $result = collect([]);
        $menus->each(function ($menu) use ($result) {
            $meals = Meal::where("id", $menu->meal_id)->get();
            $meals->each(function ($x) use ($result) {
                $result->push($x);
            });
        });
        // for ($i = 0; $i < count($menu); $i++) {
        // $meals = Meal::where("id", $menu->meal_id)->get();
        // };
        return view('restaurant.show', ['meal' => $result->all(), 'restaurant' => $restaurant]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRestaurantRequest $request)
    {
        // $input = $request->all();
        // Restaurant::create($input);
        DB::table('restaurant')->insert([
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'stars' => $request->input('stars'),
            'price' => $request->input('price'),
            'img' => $request->input('img'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('foodsearch');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Restaurant $restaurant)
    {
        return view('restaurant.edit', ['restaurant' => $restaurant]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRestaurantRequest $request, Restaurant $restaurant)
    {
        // if ($request->user()->cannot('update', $restaurant)) {
        //     abort(403);
        // }

        $input = $request->all();
        $restaurant->update($input);
        return redirect()->route('foodsearch');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Restaurant $restaurant)
    {
        $menus = Menu::where("restaurant_id", $restaurant->id)->get();
        $result = collect([]);
        Menu::where("restaurant_id", $restaurant->id)->delete();
        $menus->each(function ($menu) use ($result) {
            Meal::where("id", $menu->meal_id)->delete();
        });
        $restaurant->delete();
        return redirect()->route('foodsearch');
    }
}
