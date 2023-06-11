<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Penginapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class PenginapanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $penginapans = Penginapan::all();

        if(auth()->user()->hasRole('innowner')){
            $penginapans = Penginapan::where('user_id', auth()->user()->id)->get();
        }

        return view('admin.penginapan.index', compact('penginapans'));
    }
    
    public function create()
    {
        $contents = Content::all();
        return view('admin.penginapan.create', compact('contents'));
    }

    public function store(Request $request)
    {
        
        $this->validate($request,[
            'content' => 'required|not_in:0',
            'name' => 'required',
            'alamat' => 'required',
            'deskripsi' => 'required',
            'hp' => 'required',
            'harga' => 'required',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg'
        ],
        [
            'content.not_in' => 'Wisata Belum Dipilih',
            'name.required' => 'Nama Wisata Belum di Isi',
            'alamat.required' => 'Alamat Belum di Isi',
            'deskripsi.required' => 'Deskripsi Belum di Isi',
            'hp.required' => 'No.Telp Belum di Isi',
            'harga.required' => 'Harga Belum di Isi',
            'thumbnail.required' => 'Thumbnail Belum di Isi',
            'thumbnail.image' => 'Format Thumbnail Tidak Valid',
        ]);

        $image = $request->file('thumbnail')->store('penginapan');

        Penginapan::create([
            'content_id' => $request->content,
            'user_id' => auth()->user()->id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'alamat' => $request->alamat,
            'deskripsi' => $request->deskripsi,
            'hp' => $request->hp,
            'harga' => $request->harga,
            'thumbnail' =>  $image,
        ]);

        Alert::success('Data Penginapan Berhasil Di Tambahkan');
        return redirect()->route('penginapan.index');
        
    }

    public function edit(Penginapan $penginapan)
    {
        if (auth()->user()->hasRole('innowner')) {
            $this->authorize('edit', $penginapan);
        }

        $contents = Content::all();
        return view('admin.penginapan.edit', compact('contents', 'penginapan'));
    }

    public function update(Request $request , Penginapan $penginapan)
    {
        if (auth()->user()->hasRole('innowner')) {
            $this->authorize('edit', $penginapan);
        }
        
        $this->validate($request,[
            'content' => 'required|not_in:0',
            'name' => 'required',
            'alamat' => 'request',
            'deskripsi' => 'required',
            'hp' => 'request',
            'harga' => 'request',
        ],
        [
            'content.not_in' => 'Wisata Belum Dipilih',
            'name.required' => 'Nama Wisata Belum di Isi',
            'alamat.required' => 'Alamat Belum di Isi',
            'deskripsi.required' => 'Deskripsi Belum di Isi',
            'hp.required' => 'No.Telp Belum di Isi',
            'harga.required' => 'Harga Belum di Isi',
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

        $image = $penginapan->thumbnail;

        if($request->hasFile('thumbnail')){
            if ($penginapan->thumbnail){
                Storage::delete($penginapan->thumbnail);
            }
            $image = $request->file('thumbnail')->store('penginapan');
        }

        $penginapan->update([
            'content_id' => $request->content,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'alamat' => $request->alamat,
            'deskripsi' => $request->deskripsi,
            'hp' => $request->hp,
            'harga' => $request->harga,
            'thumbnail' =>  $image,
        ]);

        Alert::success('Data Penginapan Berhasil Di Ubah');
        return redirect()->route('penginapan.index');

    }

    public function destroy(Penginapan $penginapan)
    {
        $penginapan->delete();
        Storage::delete($penginapan->thumbnail);
        return redirect()->route('penginapan.index');
    }

    public function editStatus(Penginapan $penginapan)
    {
        if (auth()->user()->hasRole('innowner')) {
            $this->authorize('edit', $penginapan);
        }
        return view('admin.penginapan.editStatus', compact('penginapan'));
    }

    public function updateStatus(Request $request, Penginapan $penginapan)
    {
        if (auth()->user()->hasRole('innowner')) {
            $this->authorize('edit', $penginapan);
        }
        
        $penginapan->update([
            'status_publish' => $request->status
        ]);

        Alert::success('Status Data Penginapan Berhasil Diperbarui');
        return redirect()->route('penginapan.index');
    }

    public function show(Penginapan $penginapan)
    {
        return view('admin.penginapan.show', compact('penginapan'));
    }

}
