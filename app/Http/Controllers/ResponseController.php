<?php

namespace App\Http\Controllers;

use App\Models\Response;
use App\Models\Complains;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ResponseController extends Controller
{
    public function indexResponse()
    {
        $response = Response::all();
        return view('admin.response.indexR', compact('response'));
    }

    public function formResponse($complain_id) {
        $komplen = Complains::find($complain_id);
        return view('Admin.response.tambahResponse', 
        compact('complain_id', 'komplen'));
    }

    public function createResponse(Request $request) {
        $request->validate([
            'response' => 'required|string',
        ]);

        Response::create([
            'admin_id' => Auth::user()->id,
            'complain_id' => $request->complain_id,
            'response' => $request->response,
        ]);

        // klau sudah response, maka status nya diubah menjadi 'selesai' atau resolve
        $komplen = Complains::findOrFail( $request->complain_id);
        $komplen->status = 'resolve';
        $komplen->save();

        return redirect()->route('index.response')
        ->with('success', 'Tanggal Berhasil Ditambhkan.');
    }

    public function deleteResponse(Request $request) {
        $respon = Response::findOrFail($request->id);
        $respon->delete();
        return redirect()->route('index.response')
        ->with('Delete', 'Tanggapan Berhasil Dihapus.');
    }

    public function updateResponse(Request $request) {
        $request->validate([
            'response' => 'required|string',
        ]);
        $respon = Response::findOrFail($request->id);
        $respon->response = $request->response;
        $respon->update();

        return redirect()->route('index.response')
        ->with('success', 'Tanggapan Berhasil Diupdate');
    }
}