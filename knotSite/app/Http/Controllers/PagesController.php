<?php
namespace App\Http\Controllers;

use App\Mail\Contact;
use App\Post;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PagesController extends Controller{

    public function postContact(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'subject' => 'required|min:5',
            'message' => 'required|min:10'
        ]);

        $data = [
            'email' => $request->input('email'),
            'subject' => $request->input('subject'),
            'messageBody' => $request->input('message')
        ];

        Mail::to('Knotseaborg@gmail.com')->send(new Contact($data));

        Session::flash('success', 'Your Mail has been Successfully Sent');

        return redirect('/');
    }

    public function getContact(){
        return view("pages.contact");
    }

    public function getAbout(){
      $first = "Reuben";
      $last = "Sinha";
      $full = $first." ".$last;
      $message = "Learn and live happy!";
      $data = [];
      $data["email"] = "Knotseaborg@gmail.com";
      $data["bdate"] = "07/09/1997";
      return view("pages.about")->with("fullname", $full)->with("message", $message)->withData($data);
    }

    public function getIndex(){
        $posts = Post::orderBy('created_at', 'desc')->limit(4)->get();
        return view("pages.welcome")->with('posts', $posts);
    }
  }
?>
