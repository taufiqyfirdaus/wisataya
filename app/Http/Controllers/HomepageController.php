<?php

namespace App\Http\Controllers;

use App\Models\Budaya;
use App\Models\City;
use App\Models\Content;
use App\Models\Penginapan;
use App\Models\Province;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index(){
        $contents = Content::where('status_publish', 1)->latest()->limit(6)->get();
        $budayas = Budaya::where('status_publish', 1)->latest()->limit(6)->get();
        $penginapans = Penginapan::where('status_publish', 1)->latest()->limit(6)->get();
        return view('homepage.index', compact('contents', 'budayas', 'penginapans'));
    }

    public function showPenginapan(Province $province, City $city, Content $content, Penginapan $penginapan){
        $penginapans = $content->penginapans()->where('status_publish', 1)->paginate(12);
        return view('homepage.showPenginapan', compact('content', 'penginapans', 'province', 'city', 'penginapan'));
    }
    public function detailContent(Province $province, City $city, Content $content)
    {   
        $contents = Content::where('status_publish', 1)->get()->random('5');
        $provinces = Province::get()->random('5');
       return view('homepage.detail', compact('province','city','content','contents','provinces'));
        // dd($province->name);
    }
    public function detailPenginapan(Province $province, City $city, Content $content, Penginapan $penginapan)
    {
       return view('homepage.detailPgn', compact('province','city','content', 'penginapan'));
        // dd($province->name);
    }

    public function detailBudaya(Province $province, City $city, Content $content, Budaya $budaya, Penginapan $penginapan)
    {
        $contents = Content::where('status_publish', 1)->get()->random('5');
        $budayas = Budaya::where('status_publish', 1)->get()->random('5');
        $penginapans = Penginapan::where('status_publish', 1)->get()->random('1');
        $provinces = Province::get()->random('5');
       return view('homepage.detailBdy', compact('province','city','content','contents','provinces', 'budaya', 'budayas', 'penginapans'));
        // dd($province->name);
    }

    public function getContentProvince(Province $province)
    {
        $city = City::where('province_id', $province->id)->pluck('id');
        $contents = Content::where('status_publish', 1)->whereIn('city_id', $city)->paginate(12);
        $budayas = Budaya::where('status_publish', 1)->whereIn('city_id', $city)->paginate(12);
        return view('homepage.getContentProvince', compact('contents','province', 'budayas'));
    }

    public function getBudayaProvince(Province $province)
    {
        $city = City::where('province_id', $province->id)->pluck('id');
        $contents = Content::where('status_publish', 1)->whereIn('city_id', $city)->paginate(12);
        $budayas = Budaya::where('status_publish', 1)->whereIn('city_id', $city)->paginate(12);
        return view('homepage.getBudayaProvince', compact('contents','province', 'budayas'));
    }

    public function getPenginapanProvince(Province $province)
    {
        $city = City::where('province_id', $province->id)->pluck('id');
        $contents = Content::where('status_publish', 1)->whereIn('city_id', $city)->paginate(12);
        $budayas = Budaya::where('status_publish', 1)->whereIn('city_id', $city)->paginate(12);
        $penginapans = Penginapan::where('status_publish', 1)->whereIn('content_id', $content)->paginate(12);
        return view('homepage.getBudayaProvince', compact('contents','province', 'budayas', 'penginapans', 'content'));
    }

    public function getProvince()
    {
        $provinces = Province::all();
        return view('homepage.getProvince', compact('provinces'));
    }

    public function getProvinceBudaya()
    {
        $provinces = Province::all();
        return view('homepage.getProvinceBudaya', compact('provinces'));
    }
    public function result(Request $request)
    {
        $search = $request->search;

        $city = City::where('name','like', '%' . $search . '%')->first();
        $province = Province::where('name','like', '%' . $search . '%')->first();

        $contents = Content::where('status_publish', 1)->where('title','like', '%' . $search . '%')->paginate(12);
        $budayas = Budaya::where('status_publish', 1)->where('title','like', '%' . $search . '%')->paginate(12);

        if ($city == !null) {
            $contents = Content::where('status_publish', 1)->where('city_id',$city->id)->paginate(12);
            $budayas = Budaya::where('status_publish', 1)->where('city_id',$city->id)->paginate(12);
        }

        if ($province == !null) {
            $city = City::where('province_id', $province->id )->pluck('id');
            $contents = Content::where('status_publish', 1)->whereIn('city_id',$city)->paginate(12);
            $budayas = Budaya::where('status_publish', 1)->whereIn('city_id',$city)->paginate(12);
        }
        
        return view('homepage.result', compact('search','contents', 'budayas'));
    }
    public function otherContent()
    {
        $current_id = Content::where('status_publish', 1)->offset(0)->limit(6)->latest()->pluck('id');
        $contents = Content::where('status_publish', 1)->latest()->whereNotIn('id', $current_id)->paginate(9);
        return view('homepage.otherContent', compact('contents'));
    }
    public function otherBudaya()
    {
        $current_id = Budaya::where('status_publish', 1)->offset(0)->limit(6)->latest()->pluck('id');
        $budayas = Budaya::where('status_publish', 1)->latest()->whereNotIn('id', $current_id)->paginate(9);
        return view('homepage.otherBudaya', compact('budayas'));
    }
    public function otherPenginapan()
    {
        $current_id = Penginapan::where('status_publish', 1)->offset(0)->limit(6)->latest()->pluck('id');
        $penginapans = Penginapan::where('status_publish', 1)->latest()->whereNotIn('id', $current_id)->paginate(9);
        return view('homepage.otherPenginapan', compact('penginapans'));
    }
}
