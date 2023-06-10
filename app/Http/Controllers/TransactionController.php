<?php

namespace App\Http\Controllers;

use App\Models\Penginapan;
use App\Models\Province;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class TransactionController extends Controller
{

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

    public function details()
    {
        $data['penginapan'] = Penginapan::get();
        return view('transaction.details', compact('data'));
    }
    public function store(Request $request)
    {
        $tr = new Transaction;
        $tr->id_user = '1';
        $tr->id_penginapan = $request->input('id_penginapan');
        $tr->checkin = $request->input('checkin');
        $tr->checkout = $request->input('checkout');
        $tr->harga = $request->input('harga');
        $tr->save();
        $tr = Transaction::select('transactions.*', 'penginapans.name as penginapanName', 'alamat', 'penginapans.harga as hargamalam')->join('penginapans', 'penginapans.id', 'transactions.id_penginapan')->where('transactions.id', $tr->id)->first();
        return view('transaction.index', compact('tr'));
    }
}
