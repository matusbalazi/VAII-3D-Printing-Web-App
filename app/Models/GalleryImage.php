<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['image'];

    public function image()
    {
        return $this->hasOne(File::class);
    }
}
