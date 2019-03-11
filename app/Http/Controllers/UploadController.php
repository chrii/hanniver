<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Chumper\Zipper\Facades\Zipper;
use ZipArchive;
use Nathanmac\Utilities\Parser\Facades\Parser;
use App\Upload;

class UploadController extends Controller
{
    public function index() {

        // @FIXME 
        // Add Method for time
        $uploadStorage = Storage::files('public/product-sheets');
        //dd($uploadStorage);
        $uploadStorage = collect($uploadStorage)
                        ->map(function($file) {
                            $modified = Storage::lastModified($file);
                            $nameOnly = explode('/', $file);
                            $map = [
                                'filename' => $nameOnly[2], 
                                'modified' => $modified
                            ];
                            //dd($nameOnly);
                            return $map;
                        });
        $uploadStorage = collect($uploadStorage);
        $zip = $this->unzip();
                        //dd($uploadStorage);
        return view('upload-views.view-upload', ['filenames' => $uploadStorage]);
    }

    public function store(Request $request) {
        $uploaded = $request
                    ->validate([
                        'upload' => ['mimes:ods', 'min:1', 'max:20000', 'file', 'required']
                    ]);

        /** Store File with unique Name */
        $fileName = 'produkt-liste-' . time() . '.' . $request->upload->getClientOriginalExtension();
        $request->upload->storeAs('public/product-sheets', $fileName);

        return redirect('upload');
    }

    /**
     * Gets Archive from ods to zip and fetches content xml
     */
    public function unzip() {
        /** 
         * asset Method doesnt work
         * storage Link to public with:
         * php artisan storage:link
         */
        //$link = asset('storage/product-sheets/produkt-liste-1552185201.zip');
        $link = 'storage/product-sheets/' . request()->d;

        $zip = new ZipArchive;
    
        if($zip->open($link)) {
            $xml = $zip->getFromName('content.xml');
            $parsed = collect(Parser::xml($xml));
            $this->productCollection($parsed);
        }
    }
    
    /**
     * This Models the final Product Collection
     * ods->zip->xml->collection
     */
    public function productCollection($xml) {
        $extractedData = collect($xml['office:body']['office:spreadsheet']['table:table']['table:table-row']);
        $extractedData = collect($extractedData->first()['table:table-cell']);
        
        $extractedData->each(function($item){
            dump($item);

        });
    }
}