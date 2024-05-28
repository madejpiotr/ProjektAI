<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meal;
use App\Models\Menu;
use App\Models\Restaurant;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class Information
{
    public $id;
    public $name;
    public $count;
    public $restaurant;
    public $price;

    public function __construct($id, $name, $count, $restaurant, $price)
    {
        $this->id = $id;
        $this->name = $name;
        $this->count = $count;
        $this->restaurant = $restaurant;
        $this->price = $price;
    }

    public function getTotalPrice()
    {
        return $this->count * $this->price;
    }
}

class OrderController extends Controller
{
    public function store(Meal $meal)
    {
        $menu = Menu::where("meal_id", $meal->id)->first();
        $restaurant = Restaurant::where("id", $menu->restaurant_id)->first();
        DB::table('order')->insertGetId([
            'restaurant_id' => $restaurant->id,
            'meal_id' => $meal->id
        ]);

        return redirect()->route('restaurant.show', ['restaurant' => $restaurant->id]);
    }

    public function index()
    {
        $orders = Order::all();
        $informations = [];
        $total = 0;

        foreach ($orders as $order) {
            $meal = Meal::find($order->meal_id);
            $restaurant = Restaurant::find($order->restaurant_id);

            $found = false;
            foreach ($informations as $info) {
                if ($info->name == $meal->name && $info->restaurant == $restaurant->name) {
                    $info->count++;
                    $found = true;
                    break;
                }
            }
            if (!$found) {
                $informations[] = new Information(
                    $order->id,
                    $meal->name,
                    1,
                    $restaurant->name,
                    $meal->price
                );
            }
            $total += $meal->price;
        }

        return view('basket', ['informations' => $informations, 'total' => $total]);
    }

    public function destroy(Order $order){
        $order->delete();
        return redirect()->route('basket');
    }
    public function clearOrder(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
            'payment_method' => 'required|string'
        ]);

        DB::table('order')->truncate();
        return redirect()->route('foodsearch');
    }
}
