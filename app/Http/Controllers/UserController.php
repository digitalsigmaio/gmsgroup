<?php

namespace App\Http\Controllers;

use App\GMS;
use App\Http\Requests\StoreUserRequest;
use App\Transformers\UserTransformer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth', ['except'=> ['login', 'authenticate', 'store']]);
    }

    public function index()
    {
        if (Auth::user()->role > 2){
            abort(404);
        }
        $users = User::all();

        return view('users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('newUser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $user = new User;

        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        if (isset($request->role)){
            $user->role = $request->role;
        }

        $user->save();
        if($request->wantsJson()){
            return  fractal()
                ->item($user)
                ->transformWith(new UserTransformer)
                ->toArray();
        }

        return redirect()->route('users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if (Auth::user()->role() === "Editor"){
            abort(404);
        }

        return view('editUser', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->username = $request->username;
        $user->email = $request->email;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        if(isset($request->password) && $request->password != null){
            $user->password = bcrypt($request->password);
        }

        if (isset($request->role)){
            $user->role = $request->role;
        }

        if($request->hasFile('image')){

            $image = $request->file('image');

            $filename = 'user_' . $user->id . '.' . $image->getClientOriginalExtension();
            $destinationPath = 'img/user';
            $image->move($destinationPath, $filename);
            $uri = $destinationPath . '/' . $filename;

            $user->image = $uri;
        }

        $user->save();
        if($request->wantsJson()){
            return  fractal()
                ->item($user)
                ->transformWith(new UserTransformer)
                ->toArray();
        }

        return redirect()->route('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        File::delete($user->image);
        $user->delete();
        return redirect()->route('users');
    }

    /*
     * Login form
     * */
    public function login()
    {
        return view('login');
    }

    /*
     * Logout
     * */
    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }

    /*
     * Authentication
     * */
    public function authenticate(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);
        if(Auth::attempt(['username'=>$request->username, 'password'=>$request->password])){
            return redirect()->route('home');
        }
        return redirect()->back()->withErrors(['message' => 'User is not registered']);
    }


}
