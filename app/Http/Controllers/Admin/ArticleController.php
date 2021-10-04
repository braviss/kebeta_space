<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class ArticleController extends Controller
{
    public function index()
   {
       $data = Article::orderBy('id', 'desc')->get();
       return Inertia::render('Admin/Article', ['data' => $data]);
   }

   public function store(Request $request)
   {
       Article::create($request->all());
       Log::channel('admin')->info('Администратор '. Auth::user()->name. ' добавил статью: '. $request->title);
       return redirect()->back();
   }
   public function update(Request $request)
   {
       if ($request->has('id')) {
           Article::find($request->input('id'))->update($request->all());
           return redirect()->back();
       }
   }
   public function destroy(Request $request)
   {
       if ($request->has('id')) {

           Article::find($request->input('id'))->delete();

           Log::channel('admin')->info('Администратор '. Auth::user()->name. ' удалил статью: '. $request->title);
           return redirect()->back();
       }
   }
}
