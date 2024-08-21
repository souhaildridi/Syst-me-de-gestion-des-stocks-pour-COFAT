<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Auth;

class CustomAuthController extends Controller
{
   
 
    public function index()
    {
        return view('login');
    }  
        
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
    
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('product')
                        ->with('message', 'Signed in!');
        }
   
        return redirect('/loginuser')->with('message', 'Login details are not valid!');
    }
 
    public function signup()
    {
        return view('registration');
    }





    public function update(Request $request, string $id)
{
    $user = User::findOrFail($id);

    if ($request->hasFile('avatar_user')) {
        if (Storage::disk('public')->exists('avatars/' . $user->avatar_user)) {
            Storage::disk('public')->delete('avatars/' . $user->avatar_user);
        }

        $avatar = $request->file('avatar_user');
        $filename = time() . '.' . $avatar->getClientOriginalExtension();
        $avatar->storeAs('public/avatars', $filename);
        $user->avatar_user = 'storage/avatars/'.$filename;
    }

    $user->update($request->except('avatar_user'));
    return redirect()->route('listeUser')->with('success', 'User updated successfully');
}
 
    public function create(array $data)
{
    return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'Tel_user' => $data['Tel_user'],
        'avatar_user' => asset('storage/avatars/'.$data['avatar_user']),
        'departement' => $data['departement'],
        'password' => Hash::make($data['password'])
    ]);
}
     
    public function landingpage()
    {
        return view('landingpage');
    }
     
    public function signOut() {
        Session::flush();
        Auth::logout();
   
        return redirect('/loginuser');
    }

    public function signupsave(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'Tel_user' => 'required',
            'avatar_user' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'departement' => 'required',
        ]);
        if ($request->hasFile('avatar_user')) {
            $avatar = $request->file('avatar_user');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            try {
                $avatar->storeAs('public/avatars', $filename);
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Error uploading file: ' . $e->getMessage());
            }
        } else {
            return redirect()->back()->with('error', 'Avatar file not found.');
        }
    
        $data = $request->except('avatar_user');
        $data['avatar_user'] = $filename;
        $check = $this->create($data);
        return redirect("listeUser");
    }
    public function listeUser()
{
    if(Auth::guard('admin')->check()){
        $users=User::orderBy('created_at', 'ASC')->get();
        return view('listeUser', compact('users'));
    }
    return redirect('/loginadmin');
}

public function ajouterUser()
{
    if(Auth::guard('admin')->check()){
        $users = User::all();
        return view('ajouterUser', compact('users'));
    }
    return redirect('/loginadmin');
}
public function destroy(string $id)
{
    $user = User::findOrFail($id);
    $user->delete();
    return redirect()->route('listeUser')->with('success', 'user deleted successfully');
}
public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('editUser', compact('user'));
    }
}