<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PastryMenu extends Model
{
    use HasFactory;

    protected $table = 'pastry_menus';

    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
    ];
}
