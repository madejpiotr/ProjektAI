<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Menu;
use App\Models\Order;


class Meal extends Model
{
    use HasFactory;

    protected $table = 'meal';
    protected $fillable = ['name', 'price', 'category', 'img'];
    protected $casts = ['price' => 'decimal:2'];


    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class);
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
