<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    var $fillable = ['reference', 'quantity', 'nota'];

    protected $attributes = [
        'quantity' => 0,
    ];

    function canDestroy()
    {
        return $this->hasNoMoreStock();
    }

    function hasNoMoreStock()
    {
        return $this->quantity <= 0;
    }
    function incrementStock()
    {
        $this->quantity += 1;
    }
}
