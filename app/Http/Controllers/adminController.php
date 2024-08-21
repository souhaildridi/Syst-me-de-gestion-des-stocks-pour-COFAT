<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Hash;
use Session;
use App\Models\admin;
use App\Models\User;
use App\Models\transaction;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Auth;

class adminController extends Controller
{
    
    public function index()
    {
        return view('loginadmin');
    }
    

    public function loginadmin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
    
        $credentials = $request->only('email', 'password');
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->intended('/indexDash')
                        ->with('message', 'Signed in!');
        }
   
        return redirect('/loginadmin')->with('message', 'Login details not valid!');
    }
    public function signOut() {
        Session::flush();
        Auth::logout();
   
        return redirect('loginadmin');
    }
    public function signup()
    {
        return view('registrationadmin');
    }




    public function create(array $data)
{
    return admin::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'avatar_admin' => asset('storage/avatars/'.$data['avatar_admin']), 
        'password' => Hash::make($data['password'])
    ]);
}
public function dashboardadmin()
{
    if(Auth::guard('admin')->check()){
        $transactions = transaction::all();
        $product = Product::orderBy('created_at', 'DESC')->get();
        return view('/dashboardadmin', compact('transactions', 'product'));
    }
    return redirect('/loginadmin');

}
public function indexDash()
{
    if(Auth::guard('admin')->check()){
        $transactions = transaction::all();
        $admins=admin::orderBy('created_at', 'ASC')->get();
        $products = Product::orderBy('created_at', 'DESC')->get();
        $users = User::orderBy('created_at', 'DESC')->get();

            $adminsCount = admin::count();
            $produitsCount = Product::count();
            $transactionsCount = transaction::count();
            $usersCount = User::count();

        return view('indexDash', compact('transactions', 'products','admins', 'users','adminsCount', 'produitsCount', 'transactionsCount', 'usersCount'));
    }
    return redirect('/loginadmin');

}
public function listeAdmin()
{
    if(Auth::guard('admin')->check()){
        $transactions = transaction::all();
        $admins=admin::orderBy('created_at', 'ASC')->get();
        return view('listeAdmin', compact('transactions', 'admins'));
    }
    return redirect('/loginadmin');

}

public function ajouterAdmin()
{
    if(Auth::guard('admin')->check()){
        $transactions = transaction::all();
        $product = Product::orderBy('created_at', 'DESC')->get();
        $admins=admin::orderBy('created_at', 'ASC')->get();
        return view('ajouterAdmin', compact('transactions', 'admins'));
    }
    return redirect('/loginadmin');

}




    public function signupsave(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'avatar_admin' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);
    
        
        if ($request->hasFile('avatar_admin')) {
            $avatar = $request->file('avatar_admin');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            try {
                $avatar->storeAs('public/avatars', $filename); 
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Error uploading file: ' . $e->getMessage());
            }
        } else {
            return redirect()->back()->with('error', 'Avatar file not found.');
        }
    
        $data = $request->except('avatar_admin'); 
        $data['avatar_admin'] = $filename; 
    
        $check = $this->create($data);
    
        return redirect("dashboardadmin");
    }
    
 

    public function show(string $id)
    {
    }

    
    public function edit($id)
    {
        $admin = admin::findOrFail($id);
        return view('editAdmin', compact('admin'));
    }
    

    public function update(Request $request, string $id)
{
    $admin = admin::findOrFail($id);

    if ($request->hasFile('avatar_admin')) {
        
        if (Storage::disk('public')->exists('avatars/' . $admin->avatar_admin)) {
            Storage::disk('public')->delete('avatars/' . $admin->avatar_admin);
        }

        $avatar = $request->file('avatar_admin');
        $filename = time() . '.' . $avatar->getClientOriginalExtension();
        $avatar->storeAs('public/avatars', $filename);

        $admin->avatar_admin = 'storage/avatars/'.$filename;
    }

    // Met à jour les autres champs de l'administrateur
    $admin->update($request->except('avatar_admin'));

    return redirect()->route('listeAdmin')->with('success', 'Admin updated successfully');
}

public function destroy(string $id)
{
    $admin = admin::findOrFail($id);

    $admin->delete();

    return redirect()->route('listeAdmin')->with('success', 'admin deleted successfully');
}

}
