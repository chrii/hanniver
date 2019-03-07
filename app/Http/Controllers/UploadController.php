<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Chumper\Zipper\Facades\Zipper;

class UploadController extends Controller
{
    public function index() {

        // @FIXME 
        // Add Method for time
        $uploadStorage = Storage::files('product-sheets');
        $uploadStorage = collect($uploadStorage)
                        ->map(function($file) {
                            $modified = Storage::lastModified($file);
                            $nameOnly = explode('/', $file);
                            $map = [
                                'filename' => $nameOnly[1], 
                                'modified' => $modified
                            ];
                            //dd($nameOnly);
                            return $map;
                        });
        $uploadStorage = collect($uploadStorage);
        //$zip = $this->unzip();
                        //dd($uploadStorage);
        return view('upload-views.view-upload', ['filenames' => $uploadStorage]);
    }

    public function store(Request $request) {
        $uploaded = $request
                    ->validate([
                        'upload' => ['mimes:ods', 'min:1', 'max:20000', 'file', 'required']
                    ]);

        $fileName = 'produkt-liste-' . time() . '.' . $request->upload->getClientOriginalExtension();
        $request->upload->storeAs('product-sheets', $fileName);
        //$test = Storage::files('product-sheets');

        return redirect('upload');
    }

    public function unzip() {
        $new = asset('product-sheets/produkt-liste-1551973107.zip');
        
        $zipper = Zipper::make('product-sheets/produkt-liste-1551973107.zip')->getFileContent('content.xml');
        //dd($new);
        
    }

}
