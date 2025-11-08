<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
  // Получение списка просматриваемых сериалов пользователя
  public function watchlist()
  {
    return response()->json();
  }

  // Обновление профиля пользователя
  public function updateProfile(Request $request)
  {
    return response()->json();
  }
}
