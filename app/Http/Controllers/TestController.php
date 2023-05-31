<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function create(Request $request)
    {
        // $test = new Test();
        // $test->variant_id = $request->variant_id;
        // $test->image = $request->image;
        // $test->answer = $request->answer;
        // $destination_path = 'public/images/questions';
        // $image = $request['image'];
        // $path = $request->image->store('images');
        // $image_name = $request->image->getClientOriginalName();
        $file = $request->file('image');

        $file->store('test/image');

        return 'Bajarildi';
        // $request['image']->storeAs($destination_path,$image_name);
        // $test->save();
        // return ("Joylandi yangi");
    }
}
