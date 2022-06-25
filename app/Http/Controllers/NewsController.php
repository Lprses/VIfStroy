<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function allNews()
    {
        $requests=News::paginate(16);
        return view('items.news.all', compact('requests'));
    }
}
