<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImportCsvRequest;
use App\Jobs\ProcessCsvImportJob;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    //
    public function massImport(ImportCsvRequest $request)
    {
        // Dispatch a job for each file uploaded
        foreach ($request->file('files') as $file) {
            $path = $file->store('imports');

            ProcessCsvImportJob::dispatch($path, auth()->user()->id);
        }

        return response()->json([
            'message' => 'File uploaded successfully, processing in background.',
        ]);
    }
}
