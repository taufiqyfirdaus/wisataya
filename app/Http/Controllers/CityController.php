<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use App\Models\Province;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class CityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Province $province)
    {
        $cities = City::where('province_id', $province->id)->get();
        return view('admin.city.index', compact('province','cities'));
    }
    public function create(Province $province)
    {
        return view('admin.city.create', compact('province'));
    }

    public function store(Request $request, Province $province)
    {
        $this->validate($request,[
            'city' => 'required'
        ],
        [
            'city.required' => 'Nama Kabupaten/Kota Belum di isi'
        ]);

        City::create([
            'province_id' => $request->province,
            'name' => $request->city,
            'slug' => Str::slug($request->city)
        ]);

        Alert::success('Data Kabupaten/Kota Berhasil Ditambahkan');
        return redirect()->route('city.index', $province);
    }

    public function edit(Province $province, City $city)
    {
        return view('admin.city.edit', compact('province','city'));
    }

    public function update(Request $request,Province $province, City $city)
    {
        $this->validate($request,[
            'city' => 'required'
        ],
        [
            'city.required' => 'Nama Kabupaten/Kota Belum di isi'
        ]);

        $city->update([
            'name' => $request->city,
            'slug' => Str::slug($request->city)
        ]);

        Alert::success('Data Kabupaten/Kota Berhasil Diubah');
        return redirect()->route('city.index', $province);
 
    }

    public function destroy(Province $province, City $city)
    {
        $city->delete();
        return redirect()->route('city.index', $province);

    }

}
