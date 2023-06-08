<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Budaya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class BudayaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $budayas = Budaya::all();

        if(auth()->user()->hasRole('contributor')){
            $budayas = Budaya::where('user_id', auth()->user()->id)->get();
        }

        return view('admin.budaya.index', compact('budayas'));
    }
    
    public function create()
    {
        $cities = City::all();
        return view('admin.budaya.create', compact('cities'));
    }

    public function store(Request $request)
    {
        
        $this->validate($request,[
            'city' => 'required|not_in:0',
            'title' => 'required',
            'content' => 'required',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg'
        ],
        [
            'city.not_in' => 'Kabupaten/Kota Belum Dipilih',
            'title.required' => 'Nama Wisata Belum di Isi',
            'content.required' => 'Deskripsi Belum di Isi',
            'thumbnail.required' => 'Thumbnail Belum di Isi',
            'thumbnail.image' => 'Format Thumbnail Tidak Valid',
        ]);

        $image = $request->file('thumbnail')->store('budaya');

        Budaya::create([
            'city_id' => $request->city,
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'thumbnail' =>  $image,
        ]);

        Alert::success('Data Wisata Berhasil Di Tambahkan');
        return redirect()->route('budaya.index');
        
    }

    public function edit(Budaya $budaya)
    {
        if (auth()->user()->hasRole('contributor')) {
            $this->authorize('edit', $budaya);
        }

        $cities = City::all();
        return view('admin.budaya.edit', compact('cities', 'budaya'));
    }

    public function update(Request $request , Budaya $budaya)
    {
        if (auth()->user()->hasRole('contributor')) {
            $this->authorize('edit', $budaya);
        }
        
        $this->validate($request,[
            'city' => 'required|not_in:0',
            'title' => 'required',
            'content' => 'required',
            
        ],
        [
            'city.not_in' => 'Kabupaten/Kota Belum Dipilih',
            'title.required' => 'Judul Konten Belum Di Isi',
            'content.required' => 'Deskripsi Belum Di Isi',
           
        ]);

        if ($request->hasFile('thumbnail')) {
            $this->validate($request,[
                'thumbnail' => 'required|image|mimes:jpeg,png,jpg',
                
            ],
            [
                'thumbnail.required' => 'Thumbnail Belum Di Isi',
                'thumbnail.image' => 'Format Thumbnail Tidak Valid',
            ]);
        }

        $image = $budaya->thumbnail;

        if($request->hasFile('thumbnail')){
            if ($budaya->thumbnail){
                Storage::delete($budaya->thumbnail);
            }
            $image = $request->file('thumbnail')->store('budaya');
        }

        $budaya->update([
            'city_id' => $request->city,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'thumbnail' =>  $image,
        ]);

        Alert::success('Data Budaya Berhasil Di Ubah');
        return redirect()->route('budaya.index');

    }

    public function destroy(Budaya $budaya)
    {
        $budaya->delete();
        Storage::delete($budaya->thumbnail);
        return redirect()->route('budaya.index');
    }

    public function editStatus(Budaya $budaya)
    {
        if (auth()->user()->hasRole('contributor')) {
            $this->authorize('edit', $budaya);
        }
        return view('admin.budaya.editStatus', compact('budaya'));
    }

    public function updateStatus(Request $request, Budaya $budaya)
    {
        if (auth()->user()->hasRole('contributor')) {
            $this->authorize('edit', $budaya);
        }
        
        $budaya->update([
            'status_publish' => $request->status
        ]);

        Alert::success('Status Data Konten Berhasil Diperbarui');
        return redirect()->route('budaya.index');
    }

    public function show(Budaya $budaya)
    {
        return view('admin.budaya.show', compact('budaya'));
    }

}
