<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    public function getOdsToCollection() {
        $link = 'storage/product-sheets/produkt-liste-1552185201.zip';
        $zip = new ZipArchive;
    
        if($zip->open($link)) {
            
            $xml = $zip->getFromName('content.xml');
    
            $parsed = Parser::xml($xml);
            $xmlCollection = collect($parsed);
            dump($xmlCollection);
        }
    }
}
