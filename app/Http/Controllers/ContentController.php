<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class ContentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $contents = Content::all();

        if(auth()->user()->hasRole('contributor')){
            $contents = Content::where('user_id', auth()->user()->id)->get();
        }

        return view('admin.content.index', compact('contents'));
    }
    
    public function create()
    {
        $cities = City::all();
        return view('admin.content.create', compact('cities'));
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

        $image = $request->file('thumbnail')->store('wisata');

        Content::create([
            'city_id' => $request->city,
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'thumbnail' =>  $image,
        ]);

        Alert::success('Data Wisata Berhasil Di Tambahkan');
        return redirect()->route('content.index');
        
    }

    public function edit(Content $content)
    {
        if (auth()->user()->hasRole('contributor')) {
            $this->authorize('edit', $content);
        }

        $cities = City::all();
        return view('admin.content.edit', compact('cities', 'content'));
    }

    public function update(Request $request , Content $content)
    {
        if (auth()->user()->hasRole('contributor')) {
            $this->authorize('edit', $content);
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

        $image = $content->thumbnail;

        if($request->hasFile('thumbnail')){
            if ($content->thumbnail){
                Storage::delete($content->thumbnail);
            }
            $image = $request->file('thumbnail')->store('wisata');
        }

        $content->update([
            'city_id' => $request->city,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'thumbnail' =>  $image,
        ]);

        Alert::success('Data Content Berhasil Di Ubah');
        return redirect()->route('content.index');

    }

    public function destroy(Content $content)
    {
        $content->delete();
        Storage::delete($content->thumbnail);
        return redirect()->route('content.index');
    }

    public function editStatus(Content $content)
    {
        if (auth()->user()->hasRole('contributor')) {
            $this->authorize('edit', $content);
        }
        return view('admin.content.editStatus', compact('content'));
    }

    public function updateStatus(Request $request, Content $content)
    {
        if (auth()->user()->hasRole('contributor')) {
            $this->authorize('edit', $content);
        }
        
        $content->update([
            'status_publish' => $request->status
        ]);

        Alert::success('Status Data Konten Berhasil Diperbarui');
        return redirect()->route('content.index');
    }

    public function show(Content $content)
    {
        return view('admin.content.show', compact('content'));
    }

}
