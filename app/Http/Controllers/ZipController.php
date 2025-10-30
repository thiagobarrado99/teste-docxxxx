<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreZipRequest;
use App\Models\Zip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ZipController extends Controller
{
    //
    public function index(Request $request)
    {
        $zips = Zip::all();
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
}
