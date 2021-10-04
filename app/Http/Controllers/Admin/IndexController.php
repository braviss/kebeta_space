<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Inertia\Inertia;

class IndexController extends Controller
{

  public function index()
  {

      $countUser = User::get()->count();
//dd($countUser);
      return Inertia::render('Admin/Dashboard', [
          'countUser' => $countUser
      ]);
  }



}
