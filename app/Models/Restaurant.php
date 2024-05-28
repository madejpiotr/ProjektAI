<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Menu;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Order;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Restaurant extends Model
{
    use HasFactory;
    protected $table = 'restaurant';

    protected $fillable = ['name', 'menu_id', 'address', 'stars', 'price', 'img', 'description'];

    protected $casts = ['price' => 'decimal:2'];

    public function order(): HasMany
    {
        return $this->hasMany(Order::class);
    }     
}
