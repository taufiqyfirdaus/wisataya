<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }
    public function create()
    {
        $roles = Role::all();
        return view('admin.user.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'password_confirm' => 'required|same:password',
            'role' => 'not_in:0',
            'image' => 'required|mimes:jpg,png,jpeg'
        ],
        [
            'name.required' => 'Nama User Harus Di Isi',
            'email.required' => 'Email User Harus Di Isi',
            'email.email' => 'Email Tidak Valid',
            'password.required' => 'Password User Harus Di Isi',
            'password.min' => 'Password Kurang Dari 8 Karakter',
            'password_confirm.required' => 'Konfirmasi Password User Harus Di Isi',
            'password_confirm.same' => 'Konfirmasi Password Tidak Sama',
            'role.not_in' => 'Hak Akses User Harus Di Isi',
            'image.required' => 'Foto User Harus Di Isi',
            'image.mimes' => 'Format Foto Tidak Valid',

        ]);

            $image = $request->file('image')->store('profile');

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'image' => $image,
            ]);

            $user->assignRole($request->role);
            Alert::success('Data User Berhasil Di Simpan');
            return redirect()->route('user.index');
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        $user_role = User::join('model_has_roles','users.id','=', 'model_has_roles.model_id')
                    ->join('roles','roles.id','=','model_has_roles.role_id')
                    ->select('users.*', 'roles.name as role_name')
                    ->where('users.id', $user->id)
                    ->first();
        return view('admin.user.edit', compact('user','roles','user_role'));
    }

    public function update(Request $request, User $user)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'not_in:0',
           
        ],
        [
            'name.required' => 'Nama User Harus Di Isi',
            'email.required' => 'Email User Harus Di Isi',
            'email.email' => 'Email Tidak Valid',
            'role.not_in' => 'Hak Akses User Harus Di Isi',
          
        ]);

        if($request->hasFile('image')){
            $this->validate($request,[
                'image' => 'required|mimes:jpg,png,jpeg'
            ],
            [
                'image.required' => 'Foto User Harus Di Isi',
                'image.mimes' => 'Format Foto Tidak Valid',    
            ]);   
        }

        $password = $user->password;
        if($request->password == !null)
        {
            $this->validate($request,[
                'password_confirm' => 'required|same:password',
                'role' => 'not_in:0', 
            ],
            [
                'password.required' => 'Password User Harus Di Isi',
                'password.min' => 'Password Kurang Dari 8 Karakter',
                'password_confirm.required' => 'Konfirmasi Password User Harus Di Isi',
                'password_confirm.same' => 'Konfirmasi Password Tidak Sama',
            ]);

            $password = bcrypt($request->password);
            
        }
        
        $image = $user->image;

        if($request->hasFile('image')){
            if ($user->image){
                Storage::delete($user->image);
            }
            $image = $request->file('image')->store('profile');
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password,
            'image' =>  $image,
        ]);

        if($request->role == null){
            $user->revokePermissionTo($request->role);
        }
        else{
            $user->syncRoles($request->role);
        }

        Alert::success('Data User Berhasil Di Ubah');
        return redirect()->route('user.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        Storage::delete($user->image);
        return redirect()->route('user.index');
    }

}
