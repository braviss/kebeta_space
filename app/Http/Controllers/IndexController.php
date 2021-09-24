<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryPost;
use App\Models\User;
use Inertia\Inertia;


class IndexController extends Controller
{
  public function index()
  {
      $categorys = CategoryPost::offset(request('offset'))->take(10)->get();

      return response()->json($categorys);
  }



}
