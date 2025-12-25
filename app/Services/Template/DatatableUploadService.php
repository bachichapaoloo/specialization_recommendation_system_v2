<?php

namespace App\Services\Template;

use Illuminate\Support\Facades\Storage;

class DatatableUploadService
{

    private $id;
    private $path;

    public function set($path='file')
    {
        // $this->id = $id;
        $this->path = session('host').'/'. $path . '/';
        return $this;
    }

    public function upload($attachment)
    {
        $name = Null;
        $attachment_name = Null;
        if(isset($attachment))
        {
            $file = $attachment->hashName(); //$attachment->getClientOriginalName(); //$file->hashName();
            $filename = pathinfo($file, PATHINFO_FILENAME);
            $extension = pathinfo($file, PATHINFO_EXTENSION);
            $filename = $filename . time();
            $path = $attachment->storeAs($this->path,$filename.'.'.$extension);

            $attachment_name = $filename.'.'.$extension;

        }
        return $attachment_name;
    }

    public function download($file)
    {

        if($this->isFileExist($file))
        {

            // \Debugbar::info($file);
            return response()->download(storage_path('app/'.$this->path.$file));

        }

    }

    public function delete($name)
    {

        if($this->isFileExist($name))
        {
            Storage::delete($this->path . '/'.$name);
        }

    }
    public function isFileExist($name)
    {
         //check if file already exists;
         if(Storage::disk('local')->exists($this->path.'/'.$name))
         {
            return true;
         }else{
            return false;
         }
    }



}
