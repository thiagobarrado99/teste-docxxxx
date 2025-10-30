<?php

namespace App\Http\Controllers;

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
    public function store(Request $request)
    {        
        $zip = new Zip();
        $zip->fill($request->post());

        //Remove money mask from the cost field
        $zip->cost = money_unformat($zip->cost);

        //Remove mask from the zip fields
        $zip->from_postcode = preg_replace("/[^\d]/", "", $zip->from_postcode);
        $zip->to_postcode = preg_replace("/[^\d]/", "", $zip->to_postcode);

        $zip->user_id = Auth::user()->id;

        if ($zip->save()) {
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
