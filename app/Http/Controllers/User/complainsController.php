<?php

namespace App\Http\Controllers\User;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Complains;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class complainsController extends Controller
{
    public function tableUser()
    {
        $complain = Complains::where('user_id', Auth::id())->get();
        return view('user.complains.indexCom', compact('complain'));
    }

    public function formAduan(){
        $category = Category::all();
        return view('user.complains.formComplain', compact('category'));
    }

    public function deleteAduan(Request $request) {
        $complains = Complains::findOrFail($request->id);
        $complains->delete();
        return redirect()->back()->with('Delete', 'Berhasil Hapus Data');
    }

public function storeAduan(Request $req)
    {
        $req->validate([
            'category_id'   => 'required',
            'judul'         => 'required',
            'keterangan'    => 'required',
            'image'         => 'image|mimes:jpeg,png,gif,svg|max:2048',
            'lokasi'        => 'required',
            'tanggal_aduan' => 'required',
        ]);

        $filename = time() . '.' . $req->image->extension();
        $req->image->storeAs('public/complainsImages' , $filename);

        $kata     = "aduan-";
        $kar_code = '0987654321';
        $acak     = str_shuffle($kar_code);
        $code     = substr($acak, 0, 10);
        $no_aduan = $kata . $acak . $code;

        Complains::create([
            'user_id'       => Auth::user()->id,
            'category_id'   => $req->category_id,
            'no_aduan'      => $no_aduan,
            'judul'         => $req->judul,
            'keterangan'    => $req->keterangan,
            'image'         => $req->image,
            'lokasi'        => $req->lokasi,
            'tanggal_aduan' => $req->tanggal_aduan,
        ]);

        return redirect()->route('pengaduan.my')->with('success', 'aduan berhasil dikirim');
    }
}