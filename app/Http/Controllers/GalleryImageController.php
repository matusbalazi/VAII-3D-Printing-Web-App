<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\GalleryImage;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreGalleryImageRequest;
use App\Http\Requests\UpdateGalleryImageRequest;

class GalleryImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return GalleryImage::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGalleryImageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGalleryImageRequest $request)
    {
        // return [$request->file('image')->getClientOriginalName(), $request->name];

        // creating GalleryImage
        $galleryImage = GalleryImage::create(['name' => $request->name]);

        $file = $request->file('image');
        //dd($file);
        //return $file;

        $ext = strtolower($file->getClientOriginalExtension());

        $fileData = [
            'gallery_image_id' => $galleryImage->id,
            'og_name' => $file->getClientOriginalName(),
            'file_name' => $this->generateRandomString(20) . '.' . $ext,
            'folder' => 'gallery_image/' . $this->generateRandomString() . '/',
            'extension' => $ext
        ];

        $file->storeAs($fileData['folder'], $fileData['file_name']);
        File::create($fileData);

        return response()->json([
            'gallery_image' => $galleryImage->load('image')
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GalleryImage  $galleryImage
     * @return \Illuminate\Http\Response
     */
    public function show(GalleryImage $galleryImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGalleryImageRequest  $request
     * @param  \App\Models\GalleryImage  $galleryImage
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGalleryImageRequest $request, GalleryImage $galleryImage)
    {
        $galleryImage->name = $request->name;
        $galleryImage->save();
        return response()->json(['operation' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GalleryImage  $galleryImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(GalleryImage $galleryImage)
    {
        //$product->delete();
        $galleryImage = $galleryImage->load('image');
        $file = $galleryImage->image;
        // delete file
        unlink(Storage::path($file->folder . $file->file_name));
        // remove dir
        rmdir(Storage::path($file->folder));

        //delete image from db
        $file->delete();

        //delete product from db
        $galleryImage->delete();

        return response()->json(['operation' => 'success']);
    }
}
