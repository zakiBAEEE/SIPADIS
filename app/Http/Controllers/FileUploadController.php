<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

final class FileUploadController extends Controller
{
    public function process(Request $request): string
    {
        /** @var \Illuminate\Http\UploadedFile[] $files */
        $files = $request->allFiles();

        if (empty($files)) {
            abort(422, 'No files were uploaded.');
        }

        if (count($files) > 1) {
            abort(422, 'Only 1 file can be uploaded at a time.');
        }

        $requestKey = array_key_first($files);

        $file = is_array($request->input($requestKey))
            ? $request->file($requestKey)[0]
            : $request->file($requestKey);

        // Buat path unik dalam folder 'public/tmp'
        $path = 'tmp/' . now()->timestamp . '-' . Str::random(20);

        // Simpan file ke storage/app/public/tmp/...
        $storedPath = $file->store($path, 'public');

        // Return path publik (bisa digunakan langsung di <img> atau link)
        return asset('storage/' . $storedPath);
    }
}
