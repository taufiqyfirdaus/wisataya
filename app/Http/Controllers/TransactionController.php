<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Content;
use App\Models\Penginapan;
use App\Models\Province;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class TransactionController extends Controller
{

    public function tampil()
    {
        if (auth()->user()->hasRole('innowner')) {
            $transactions = Transaction::whereHas('penginapan', function ($query) {
                $query->where('user_id', auth()->user()->id);
            })->get();
        } else {
            $transactions = Transaction::all();
        }

        // $transactions = Transaction::all();

        // if(auth()->user()->hasRole('innowner')){
        //     $transactions = Transaction::where('id_user', auth()->user()->id)->get();
        // }

        return view('admin.transaction.index', compact('transactions'));
        
    }
    public function index($id)
    {
        $tr = Transaction::select('transactions.*', 'penginapans.name as penginapanName', 'alamat', 'penginapans.harga as hargamalam')->join('penginapans', 'penginapans.id', 'transactions.id_penginapan')->where('transactions.id', $id)->first();
        // return $tr;
        return view('transaction.index', compact('tr'));
    }
    public function return ()
    {
        return view('transaction.index');
    }

    public function details(Province $province, City $city, Content $content, Penginapan $penginapan)
    {
        $data['penginapan'] = Penginapan::get();
        return view('transaction.details', compact('data', 'province','city','content', 'penginapan'));
    }
    public function store(Request $request)
    {
        $id_user = auth()->user()->id;

        $tr = new Transaction;
        $tr->id_user = $id_user;
        $tr->id_penginapan = $request->input('id_penginapan');
        $tr->checkin = $request->input('checkin');
        $tr->checkout = $request->input('checkout');
        $tr->harga = $request->input('harga');
        $tr->save();
        $tr = Transaction::select('transactions.*', 'users.name as userName', 'penginapans.name as penginapanName', 'alamat', 'penginapans.harga as hargamalam')
        ->join('penginapans', 'penginapans.id', 'transactions.id_penginapan')
        ->join('users', 'users.id', 'transactions.id_user')
        ->where('transactions.id', $tr->id)->first();
        return view('transaction.index', compact('tr'));
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return redirect()->route('transaction.tampil');
    }
}
