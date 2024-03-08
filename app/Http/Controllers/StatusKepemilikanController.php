<?php

namespace App\Http\Controllers;

use App\Models\StatusKepemilikan;

use Illuminate\Http\Request;

class StatusKepemilikanController extends Controller
{
    //
    public function index()
    {
        $status_kepemilikan = StatusKepemilikan::get();
        return view('admin.status_kepemilikan.index',[
            'status_kepemilikan' => $status_kepemilikan,
            'list_status_kepemilikan' => $status_kepemilikan,
        ]);
    }

    public function create()
    {
        return view('admin.status_kepemilikan.create');
    }

    public function store(Request $request)
    {
        StatusKepemilikan::create([
            'nama' => $request->nama,
        ]);

        return redirect('/admin/status_kepemilikan');
    }

    public function edit($id)
    {
        $StatusKepemilikan = StatusKepemilikan::find($id);
        return view('admin.status_kepemilikan.edit',[
            'status_kepemilikan' => $StatusKepemilikan
        ]);
    }

    public function update(Request $request, $id){
        $status_kepemilikan = StatusKepemilikan::find($id);
        $status_kepemilikan->update([
            'nama' => $request->nama,
        ]);

        return redirect('/admin/status_kepemilikan')->with('success','Kategori berhasil diubah');
    }

    public function destroy($id){
        $status_kepemilikan = StatusKepemilikan::find($id);
        $status_kepemilikan->delete();
        return redirect('/admin/status_kepemilikan')->with('success','Kategori berhasil dihapus');
    }
}
