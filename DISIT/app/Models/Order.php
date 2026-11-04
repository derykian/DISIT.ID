<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Proteksi dihilangkan agar semua kolom bisa diisi manual
    protected $guarded = [];
}
