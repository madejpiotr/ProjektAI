<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meal;
use App\Models\Menu;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreMealRequest;
use App\Http\Requests\UpdateMealRequest;
use App\Models\Restaurant;


class MealController extends Controller
{

    public function create(Restaurant $restaurant)
    {
        if(!Gate::allows('create', Meal::class)) {
            abort(403, 'Unauthorized action.');
        }
        return view('meal.create', ['restaurant' => $restaurant]);
    }

    public function show(Meal $meal)
    {
    }
    public function store(StoreMealRequest $request)
    {
        $meal = DB::table('meal')->insertGetId([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'category' => $request->input('category'),
            'img' => $request->input('img'),
        ]);

        DB::table('menu')->insert([
            'restaurant_id' => $request->input('restaurant_id'),
            'meal_id' => $meal,
        ]);

        return redirect()->route('foodsearch');
    }


    public function destroy(Meal $meal)
    {
        // $menus =  Menu::where("restaurant_id", $restaurant->id)->get();
        // $result = collect([]);
        // Menu::where("restaurant_id", $restaurant->id)->delete();
        // $menus->each(function ($menu) use ($result) {
        //  Meal::where("id", $menu->meal_id)->delete();
        //  });
        if(!Gate::allows('delete', $meal)) {
            abort(403, 'Unauthorized action.');
        }
        Menu::where("meal_id", $meal->id)->delete();
        $meal->delete();
        return redirect()->route('foodsearch');
    }

    public function edit(Meal $meal)
    {
        if(!Gate::allows('update', Meal::class)) {
            abort(403, 'Unauthorized action.');
        }
        return view('meal.edit', ['meal' => $meal]);
    }

    public function update(UpdateMealRequest $request, Meal $meal)
    {
        if(!Gate::allows('update', Meal::class)) {
            abort(403, 'Unauthorized action.');
        }
        $input = $request->all();
        $meal->update($input);
        return redirect()->route('foodsearch');
    }

}
