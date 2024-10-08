<?php

namespace App\Helpers;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

trait FileManager
{
    /**
     * @throws FileNotFoundException
     */
    public function uploads($file, $path): string
    {
        if ($file) {
            $fileName   = $file->getClientOriginalName();
            Storage::disk('public')->put($path . $fileName, File::get($file));
            return  $fileName;
        }
    }

    public function fileSize($file, $precision = 2)
    {
        $size = $file->getSize();

        if ($size > 0) {
            $size = (int) $size;
            $base = log($size) / log(1024);
            $suffixes = array(' bytes', ' KB', ' MB', ' GB', ' TB');
            return round(pow(1024, $base - floor($base)), $precision) . $suffixes[floor($base)];
        }

        return $size;
    }
}
