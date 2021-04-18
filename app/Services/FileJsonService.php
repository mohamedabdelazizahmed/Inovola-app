<?php
namespace App\Services;

class FileJsonService{
    public function read()
    {
        $path = storage_path('/json/api.json');
        return json_decode(file_get_contents($path), true); 
    }
}