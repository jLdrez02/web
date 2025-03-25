<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;


class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assets = Asset::all();
       // @dd( $assets);
        return view('asset.index', compact('assets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('asset.create');
    }
 

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validación de campos requeridos
        $this->validate($request, [
            'title' => 'required|min:5',
            'image' => 'required|mimes:jpg,jpeg,png,gif',
            'video_path' => 'required|mimes:mp4'
        ]);
 
 
        $asset = new Asset();
        $asset->title = $request->input('title');
        //Subida de la miniatura
        $image = $request->file('image');
        if ($image) {
            $image_path = time() . $image->getClientOriginalName();
            Storage::disk('images')->put($image_path, File::get($image));
            $asset->image = $image_path;
        }
        //Subida del video
        $video_file = $request->file('video_path');
        if ($video_file) {
            $video_path = time() . $video_file->getClientOriginalName();
            Storage::disk('videos')->put($video_path, File::get($video_file));
            $asset->video_path = $video_path;
        }
        $asset->save();
        return redirect()->route('asset.index')->with(array(
            'message' => 'El asset se ha subido correctamente'
        ));
 
 
    }

    public function getImage($filename)
    {
        $path = Storage::disk('images')->path($filename);
    if (!Storage::disk('images')->exists($filename)) {
        abort(404);     }

    $mimeType = mime_content_type($path); 

    return response(Storage::disk('images')->get($filename), 200)
        ->header('Content-Type', $mimeType);
    }
    
    public function getVideo($filename)
   {
    $file = Storage::disk('videos')->get($filename);

    return response($file, 200)
        ->header('Content-Type', 'video/mp4');
   }

 
 

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
