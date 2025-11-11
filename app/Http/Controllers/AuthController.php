<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
  // Регистрация пользователя
  public function register(Request $request)
  {
    return response()->json();
  }

  // Аутентификация пользователя
  public function login(Request $request)
  {
    return response()->json();
  }

  // Выход пользователя
  public function logout(Request $request)
  {
    // Пустой ответ для выхода
    return response()->json();
  }
}
