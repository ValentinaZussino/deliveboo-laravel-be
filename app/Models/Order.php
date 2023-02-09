<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    public function plates(): BelongsToMany{

        return $this->belongsToMany(Plate::class)->withPivot('quantity');;
    }

    public function restaurant():BelongsTo{

        return $this->belongsTo(Restaurant::class);
    }
}
