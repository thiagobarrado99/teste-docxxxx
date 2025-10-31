<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImportCsvRequest;
use App\Http\Requests\StoreZipRequest;
use App\Jobs\ProcessCsvImportJob;
use App\Models\Zip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ZipController extends Controller
{
    //
    public function index(Request $request)
    {
        $zips = Zip::paginate(500);
        return view('dashboard.zips.index', compact('zips'));
    }

    //
    public function create()
    {
        return view('dashboard.zips.create');
    }

    //
    public function store(StoreZipRequest $request)
    {        
        $zip = Zip::create($request->validated());

        if ($zip) {
            toast("CEP criado com sucesso!", "success");
        }else{
            toast("Houve um erro ao criar o CEP!", "error");
        }
        return redirect("/dashboard/zips");
    }

    public function delete($id)
    {
        $zip = Zip::find($id);

        if ($zip->delete()) {
            toast("CEP deletado com sucesso!", "success");
        } else {
            toast("Houve um erro ao deletar o CEP!", "error");
        }
        return redirect("/dashboard/zips");
    }

    public function upload(ImportCsvRequest $request)
    {
        // Dispatch a job for each file uploaded
        foreach ($request->file('files') as $file) {
            $path = $file->store('imports');

            ProcessCsvImportJob::dispatch($path, Auth::user()->id);
        }

        Auth::user()->notifications()->create([
            "title" => "<i class='fas fa-hourglass'></i> Arquivo em processamento",
            "body" => "Os arquivos .CSV estão em processamento. Iremos lhe notificar assim que o processo for concluido."
        ]);

        toast("Arquivos recebidos com sucesso!", "success");
        return redirect("/dashboard/zips");
    }

}
