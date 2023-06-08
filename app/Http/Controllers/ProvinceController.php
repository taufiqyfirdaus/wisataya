<?php

namespace App\Http\Controllers;

use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class ProvinceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $provinces = Province::all();
        return view('admin.province.index', compact('provinces'));
    }

    public function create()
    {
        return view('admin.province.create');
    }
    
    public function store(Request $request)
    {
        $this->validate($request,[
            'province' => 'required'
        ],
        [
            'province.required' => 'Nama Provinsi Belum Di Isi'
        ]);

        Province::create([
            'name' => $request->province,
            'slug' => Str::slug($request->province)
        ]);

        Alert::success('Data Provinsi Berhasil Ditambahkan');
        return redirect()->route('province.index');
    }

    public function edit(Province $province)
    {
        return view('admin.province.edit', compact('province'));
    }

    public function update(Request $request, Province $province)
    {
        $this->validate($request,[
            'province' => 'required'
        ],
        [
            'province.required' => 'Nama Provinsi Belum Di Isi'
        ]);

        $province->update([
            'name' => $request->province,
            'slug' => Str::slug($request->province)
        ]);

        Alert::success('Data Province Berhasil Diubah');
        return redirect()->route('province.index');
    }

    public function destroy(Province $province)
    {
        $province->delete();
        return redirect()->route('province.index');
    }
}
