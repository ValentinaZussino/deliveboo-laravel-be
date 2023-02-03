<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Plate extends Model
{
    use HasFactory;


    protected $guarded = [];

    public static function generateSlug($name)
    {
        return Str::slug($name, '-');
    }

    public function restaurant():BelongsTo{

        return $this->belongsTo(Restaurant::class);
    }

    public function category():BelongsTo{

        return $this->belongsTo(Category::class);
    }
}
