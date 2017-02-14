<?php
namespace App\Http\Controllers;

use App\Post;

class PagesController extends Controller{
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
