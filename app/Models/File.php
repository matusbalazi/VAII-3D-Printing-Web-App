<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'og_name', 'file_name', 'folder', 'extension'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
