<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('user')->latest()->paginate(10);
        return view('dashboard', compact('articles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        Article::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => Auth::id(),
        ]);

        return back()->with('success','Article added.');
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);

        if (Auth::check() && Auth::user()->role === 'admin') {
            $article->delete();
            return back()->with('success','Article deleted.');
        }

        return back()->with('error','Not authorized.');
    }
}
