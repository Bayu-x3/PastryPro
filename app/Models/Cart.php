<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', // Ganti dengan 'users_id' jika kamu menggunakan nama kolom itu
        'pastry_id',
        'quantity',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function pastry()
    {
        return $this->belongsTo(PastryMenu::class, 'pastry_id');
    }
}
