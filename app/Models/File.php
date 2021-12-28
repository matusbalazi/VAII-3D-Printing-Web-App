<?php

namespace App\Models;

use App\Models\GalleryImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class File extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'gallery_image_id', 'og_name', 'file_name', 'folder', 'extension'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function galleryImage()
    {
        return $this->belongsTo(GalleryImage::class);
    }
}
