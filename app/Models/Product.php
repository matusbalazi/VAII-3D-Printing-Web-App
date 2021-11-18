<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['heading', 'price', 'description'];

    public function image()
    {
        return $this->hasOne(File::class);
    }
}
