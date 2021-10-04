<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Inertia\Inertia;

class UsersController extends Controller
{
  public function index()
  {

      $allUsers = User::orderBy('id', 'desc')->paginate(3);
//dd($countUser);
      return Inertia::render('Admin/Users', [
          'allUsers' => $allUsers
      ]);
  }

}
