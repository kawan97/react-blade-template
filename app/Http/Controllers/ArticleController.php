<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use App\Models\Language;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //get current user
        $user = auth()->user();
        $articles = new Article();
        $languages = new Language();
        
        if($user->language_id != ''){
            $articles = $articles::where('language_id',$user->language_id);
            $languages = $languages::where('id','=',$user->language_id);
        }
        //get language_id by query string
        if(request()->has('language_id') && request()->get('language_id')!=''){
            $articles = $articles->where('language_id',request()->get('language_id'));
        }
        //get title by query string
        if(request()->has('title') && request()->get('title')!=''){
            $articles = $articles->where('title','like','%'.request()->get('title').'%');
        }
        $articles = $articles->orderBy('id','desc');
        //pagiunate with query string
        $articles = $articles->paginate(10)->withQueryString();
        $languages = $languages->orderBy('id','desc')->get();

        return view('admin/pages/article/index', compact('articles','languages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //delete article
        $article->delete();
        //rederict to back with success
        return redirect()->back()->with('success','Article deleted successfully');
    }
}
