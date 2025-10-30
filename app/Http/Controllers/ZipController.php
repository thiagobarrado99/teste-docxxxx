<?php

namespace App\Http\Controllers;

use App\Models\Zip;
use Illuminate\Http\Request;

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
    public function store(Request $request)
    {        
        $zip = new Zip();
        $zip->fill($request->post());

        if ($zip->save()) {
            toast("CEP criado com sucesso!", "success");
        }else{
            toast("Houve um erro ao criar o CEP!", "error");
        }
        return redirect("/dashboard/zips");
    }

    //
    public function edit($id)
    {
        $zip = Zip::find($id);
        if(!$zip)
        {
            toast("Esse CEP não existe mais.", "warning");
            return redirect("/dashboard");
        }

        return view('dashboard.zips.edit', compact("zip"));
    }

    //
    public function update(Request $request, $id)
    {
        $zip = Zip::find($id);
        $zip->fill($request->post());

        if ($zip->save()) {
            toast("CEP editado com sucesso!", "success");
        }else{
            toast("Houve um erro ao editar o CEP!", "error");
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
