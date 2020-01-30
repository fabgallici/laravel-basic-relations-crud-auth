<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;

class ExtraController extends Controller
{
    public function setUserImage(Request $request) {

        // $data = $request -> all();
        // dd($data);

        $file = $request -> file('image');
        $filename = $file -> getClientOriginalName();

        // $file -> move('images', $filename);
        $file -> move('images/user/'. Auth::user()->name, $filename);

        $newUserData = [

            'image' => $filename

        ];

        Auth::user() -> update($newUserData);

        return redirect() -> route('posts.index');
        }

    public function testGetToken(Request $request) {
        $data = $request -> all();
        // return response() -> json('hello world'); //Postman: POST http://localhost:8000/api/user/token
        $email = $data['email'] ?? -1;
        $password = $data['password'] ?? -1;
        //login attempt
        if (Auth::attempt(compact('email', 'password'))) {
            //logged
            $user = Auth::user();
            $token = $user->api_token;
            return response() -> json(compact('token'));
        } else {
            //wrong mail
            return response() -> json('sorry wrong mail or psw');

        }

        // return response() -> json($data);
    }
    public function getAllPost() {
        $posts = Post::all();
        return response() -> json(compact('posts'));
    }
    public function getUserPost() {
       $userPosts = Auth::user() -> posts;
        return response() -> json(compact('userPosts'));
 
    }
}
