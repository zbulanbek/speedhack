<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{News};

class NewsController extends Controller
{
    public function show(){
        return inertia('Speedhack/Account/Student/News');
    }

    public function get_news(Request $request){
        $news = News::orderBy('id', 'DESC')->paginate(3);
     	$count = News::count();

        return response()->json([
            'news' => $news,
            'count' => $count,
        ]);
    }

    public function news_item(News $news)
    {
    	return inertia('Speedhack/Account/Student/ItemNews', compact('news'));
    }
}
