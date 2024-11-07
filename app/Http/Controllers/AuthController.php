<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function create(){
        return view('auth.register');
    }

    public function store(Request $request){
        $formData = $request->validate([
            'name' => ['required', 'max:225', 'min:3'],
            'username' => ['required', 'max:225', 'min:3', Rule::unique('users', 'username')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8'],
            'photo' => ['nullable', 'image', 'mimes:jpg,png,jpeg,gif', 'max:2048'],
        ]);
    
        // Handle the photo upload
        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('user-photos', 'public'); // Store in public disk
        }
    
        // Create the user
        $user = User::create([
            'name' => $formData['name'],
            'username' => $formData['username'],
            'email' => $formData['email'],
            'password' => bcrypt($formData['password']), // Hash the password
            'photo' => $photoPath, // Store the path
        ]);
    
        Auth::login($user);
        return redirect('/')->with('success', 'Welcome Dear, ' . $user->name);
    }
    

    public function login(){
        return view('auth.login');
    }

    public function post_login(Request $request){
        $formData = $request->validate([
            'email'=>['required','email','max:255',Rule::exists('users','email')],
            'password'=>['required','min:8','max:255']
        ],[
            'email.required'=>'we need your email',
            'password.min'=>'your password should be at least 8 characters'
        ]);

        if(Auth::attempt($formData)){

            if(Auth::user()->role == 'admin'){
                return redirect()->route('admin.dashboard')->with('success', 'Welcome Admin');
            }else{
                return redirect('/')->with('success','welcome  back');
            }
            
        }else{
            return redirect()->back()->withErrors([
                'email'=>'your email is not validated.',
                'password'=>'your password is incorrect.'
               ]);
        }
    }

    
    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('success','GoodBye');
    }
}
