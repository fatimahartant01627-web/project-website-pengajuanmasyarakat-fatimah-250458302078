<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\Complains;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ComplainsController extends Controller
{

    // ambil semua data dari table complains yang yser_id nya sama dengan id user yang sedang login
    // pakai get karena get ini fungsi untuk mengambil semua dta sesuai dengan kriteria yang diberikan
    // kalau mau ambil satu data aja pakai first()
    public function indexComplains() 
    {
        $aduan = Complains::all();
        return view('admin.complains.indexC', compact('aduan'));
    }


    public function updateStatus(Request $request, $id){
        $aduan = Complains::findOrFail($id);
        $aduan->status = $request->status;
        $aduan->update();
        return redirect()->with('success', 'berhasil update status');
    }
}