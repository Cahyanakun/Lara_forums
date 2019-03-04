<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Str;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Post;
use App\Banner;
use App\Category;
use Auth;

class HomepageController extends Controller
{
    public function index()
    {   
        $cates = Category::all();
        $banner = Banner::where('status', "Publish")->limit(5)->orderBy('created_at','DESC')->get();
        $berita = Post::where('status', 1)->orderBy('created_at','DESC')->paginate(6);
        return view('frontend.home', compact('berita','banner','cates'));
    }

    public function read($id)
    {    
        $cates = Category::all();
        $berita = Post::find($id);
        return view('frontend.single', compact('berita','cates'));
    }

    public function readbanner($id)
    {    
        $cates = Category::all();
        $berita = Banner::find($id);
        return view('frontend.banner', compact('berita','cates'));
    }

    public function category(Category $id)
    {
        $banner = Banner::where('status', 'Publish')->limit(5)->orderBy('created_at','DESC')->get();
        $cates = Category::all();
        $berita = $id->posts();
        return view('frontend.home', compact('berita','banner','cates'));
    }

    public function search()
    {   
        $query = Input::get('name');
        $cates = Category::all();
        $banner = Banner::where('status', 'Publish')->limit(5)->orderBy('created_at','DESC')->get();
        $berita = Post::where('title',Input::get('name'))
                    ->orWhere('title', 'like', '%'.Input::get('name').'%')
                    ->orWhere('subtitle', 'like', '%'.Input::get('name').'%')->paginate(6);
        if ($berita->count() > 0 ) {
            return view('frontend.home', compact('berita','banner','cates'));
        }else {
            return view('frontend.message', compact('berita','banner','cates'));
        }
        

    }

    public function categorycount()
    {
        $berita = Category::with('post')->get();
        return $berita;
    }

    public function about()
    {
        $cates = Category::all();
        return view('frontend.about', compact('cates'));
    }

    public function contact()
    {
        $cates = Category::all();
        return view('frontend.contact', compact('cates'));
    }
}
