<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ExtraController extends Controller
{
    public function setUserImage(Request $request) {

        // $data = $request -> all();
        // dd($data);

        $file = $request -> file('image');
        $filename = $file -> getClientOriginalName();

        $file -> move('images', $filename);

        $newUserData = [

            'image' => $filename

        ];

        Auth::user() -> update($newUserData);

        return redirect() -> route('posts.index');
        }
}
