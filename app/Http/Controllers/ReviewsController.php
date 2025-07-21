<?php

namespace App\Http\Controllers;

use App\Models\Reviews;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    public function reviews()
    {

        $reviews = Reviews::all();
        return view('reviews', ['reviews' => $reviews]);
    }
    public function storereviews(Request $request)
    {        dd( $request);

        $request->validate([
            'name' => 'required|string|max:25',
            'phone' => 'required|numeric|min:0',
            'email' => 'required|email',
            'subject' => 'required|string',
            'message' => 'required|string',

        ]);
        $newreviews = new Reviews();
        $newreviews->name = $request->name;
        $newreviews->phone = $request->phone;
        $newreviews->email = $request->email;
        $newreviews->subject = $request->subject;
        $newreviews->message = $request->message;

 $newreviews->save();
        return redirect('/reviews');
    }
}
