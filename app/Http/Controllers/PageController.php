<?php

namespace App\Http\Controllers;

use App\Mail\MessageReceived;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{
    public function render($page)
    {
        if($this->viewFileExists($page)) {
           return view("pages/{$page}");
        }
        abort(404);
    }

    public function contact(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'min:3',
            'email' => 'email',
            'subject' => 'required',
            'message' => 'min:10',
        ]);

       Mail::to(env('MAIL_FROM_ADDRESS'))->send(new MessageReceived($attributes));

       return redirect()->back()->with('success', 'We have received your email and get back to you as soon as possible.');
    }

    private function viewFileExists($page)
    {
        return File::exists(resource_path("views/pages/{$page}.blade.php"));
    }
}
