<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;



class Restaurant extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function generateSlug($name)
    {
        return Str::slug($name, '-');
    }

    public function types(): BelongsToMany
    {
        return $this->belongsToMany(Type::class);
    }

    public function plates(): HasMany
    {

        return $this->hasMany(Plate::class);
    }

    public function orders(): HasMany
    {

        return $this->hasMany(Order::class);
    }

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
    
}





