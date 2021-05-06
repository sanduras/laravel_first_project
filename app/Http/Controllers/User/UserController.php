<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\App;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = User::all();
        // dd($data);
        // return view('profileuser', ['data'=> $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($locale, $viewUser)
    {
        if (!is_numeric($viewUser)) {
            //dd($viewUser);
            $user = User::select('role')->where('name', $viewUser)->first();
            //dd($user);
            if ($user->role == "user") {
                App::setLocale($locale);
                session()->put('locale', $locale);
                $viewUser = User::where("id", $viewUser)->orWhere('name', $viewUser)->first();
                return view('profileuser', ["data" => $viewUser]);
            } else {
                return abort("404");
            }
        } else {
            return abort("404");
        }
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($locale, User $viewUser)
    {
        App::setLocale($locale);
        session()->put('locale', $locale);
        return view('user.dashboardUser', ["user" => $viewUser]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($locale, User $viewUser, UserRequest $request)
    {
        App::setLocale($locale);
        session()->put('locale', $locale);
        $check = $request->password;
        $check_image = $request->profile_photo_path;
        if ($check != null) {
            $request->validate([
                'password' => ['required', new MatchOldPassword],
                'new_password' => ['required'],
                'confirm_password' => 'required|same:new_password'
            ]);
            $viewUser->password = Hash::make($request->new_password);
        }
        if ($check_image != null) {
            $request->validate([
                'profile_photo_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
            $imageName = time() . '.' . $request->profile_photo_path->extension();
            $request->profile_photo_path->move(public_path('images'), $imageName);
            $viewUser->profile_photo_path = "/images/$imageName";
        }




        $viewUser->name = $request->name;
        $viewUser->first_name = $request->first_name;
        $viewUser->last_name = $request->last_name;
        $viewUser->description = $request->description;
        $viewUser->born_year = $request->born_year;
        $viewUser->save();
        return redirect(app()->getLocale() . '/dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
