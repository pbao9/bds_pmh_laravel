<?php

namespace App\Traits;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait UploadFile
{
    public function traitUploadAllFilesForUser($file, $id, $fileDelete = null, $disk = 'uploads'){

        $folder_prefix = config('custom.user.folder-prefix');

        if($fileDelete != null && $fileDelete != '' ){
            Storage::disk($disk)->delete(Str::after($fileDelete, $folder_prefix));
        }
        
        $path = $file->storeAs($id, $file->hashName(), $disk);

        return $folder_prefix.$path;
    }

}