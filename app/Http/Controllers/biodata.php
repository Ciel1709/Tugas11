<?php

namespace App\Http\Controllers;

use App\Models\Biodata as ModelsBiodata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use stdClass;

class biodata extends Controller
{
    // Show All Biodata
    public function showAll(){
        $data = ModelsBiodata::all();
        if(count($data)){
            $res["jumlah"] = count($data);
            $res["data"] = $data;
        }else{
            $res["jumlah"] = 0;
            $res["data"] = null;
        }
        return response($res);
    }

    // Show Specific Biodata
    public function showOne($id){
        $data = ModelsBiodata::find($id);
        if($data){
            $res["status"] = "oke";
            $res["data"] = $data;
        }{
            $res["status"] = "kosong";
            $res["data"] = $data;
        }
        
        return response($res);
    }

    // Update Data on Specific Biodata
    public function update(Request $request,$id){
        $req['nama'] = $request->input('nama');
        $req['umur'] = $request->input('umur');
        $req['alamat'] = $request->input('alamat');
        $data = ModelsBiodata::where('id',$id)->update($req);
        if($data){
            $res['status'] = 'Berhasil update';
        }
        $res['status'] = 'Gagal update';
        return response($res);
    }

    // Insert New Data of Biodata
    public function store(Request $request){
        $req['nama'] = $request->input('nama');
        $req['umur'] = $request->input('umur');
        $req['alamat'] = $request->input('alamat');
        $data = ModelsBiodata::create($req);
        if($data){
            $res['status'] = 'Berhasil Input';
            $res['data'] = $data;
        }else{
            $res['status'] = 'Gagal Input';
        }
        return response(($res));
    }

    // Delete Data Of Biodata
    public function destroy($id){
        $data = ModelsBiodata::destroy($id);
        if($data){
            $res['status'] = 'Berhasil Dihapus';
            $res['data'] = $data;
        }else{
            $res['status'] = 'gagal dihapus';
        }
        return response($res);
    }
}

