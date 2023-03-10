<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plate extends Model
{
    use HasFactory, SoftDeletes;


    protected $guarded = [];

    public static function generateSlug($name, $restaurant_id)
    {
        $restaurant = Restaurant::where('id', $restaurant_id)->first();

        $restaurantName = $restaurant->name;

        $slugConcateneted = $restaurantName . '-' . $name;

        $slug = Str::slug($slugConcateneted);

        return $slug;
    }

    public function restaurant():BelongsTo{

        return $this->belongsTo(Restaurant::class);
    }

    public function category():BelongsTo{

        return $this->belongsTo(Category::class);
    }

    public function orders(): BelongsToMany{

        return $this->belongsToMany(Order::class);
    }
}
