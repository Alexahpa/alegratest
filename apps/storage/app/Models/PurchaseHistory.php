<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseHistory extends Model
{
    public function ingredient()
    {
        return $this->belongsTo(Ingredient::class);
    }
}
