<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function indexUser()
    {
        $users = User::all();
        return view('Admin.dataUser.indexDU', compact('users'));
    }

    public function createUser(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:users,email,',
            'phone'    => 'required|unique:users,phone,',
            'nik'      => 'required|unique:users,nik,',
            'gender'   => 'required',
            'role'     => 'required',
            'password' => 'required|min:6',
            'image'    => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $filename = time() .'.'. $request->image->extension();
       $request->image->storeAs('public/userImages', $filename);
        

        User::create([
            'name'    => $request->name,
            'email'   => $request->email,
            'phone'   => $request->phone,
            'nik'     => $request->nik,
            'address' => $request->address,
            'gender'  => $request->gender,
            'role'    => $request->role,
            'image'   => $filename,
            'password'=> Hash::make($request->password),
        ]);

        return redirect()->back()->with('success', 'User berhasil ditambahkan!');
    }

    public function updateUser(Request $request)
    {
        $user = User::findOrFail($request->id);

        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email,'.$user->id,
            'phone'    => 'required|unique:users,phone,'.$user->id,
            'nik'      => 'required|unique:users,nik,'.$user->id,
            'address' => 'required',
            'gender'   => 'required',
            'role'     => 'required',
            'password' => 'nullable|min:6',
            'image'    => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'nik' => $request->nik,
            'address' => $request->address,
            'gender' => $request->gender,
            'role' => $request->role,
            'image' => $request->image,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        // update image jika ada upload baru
        if ($request->hasFile('image')) {

            if ($user->image && Storage::disk('public')->exists('userImages/' . $user->image)) {
                Storage::disk('public')->delete('userImages/' . $user->image);
            }

            $filename = time(). '.' . $request->image->extension();
            $request->image->storeAs('public/userImages', $filename);
            $data['image'] = $filename;
        }

        $user->update($data);

        return redirect()->back()->with('success', 'Data  $request->name  berhasil diupdate!');
    }

    public function deleteUser(Request $request)
    {
        $user = User::findOrFail($request->id);

        if ($user->image && Storage::disk('public')->exists($user->image)) {
            Storage::disk('public')->delete($user->image);
        }

        $user->delete();

        return back()->with('delete', 'User berhasil dihapus!');
    }
}