<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Контроллер для работы с сериалами
class SerialController extends Controller
{
  // Получение списка сериалов
  public function index(Request $request)
  {
    return response()->json();
  }

  // Получение информации о сериале
  public function show($id)
  {
    return response()->json();
  }

  // Добавление сериала в список просматриваемых текущим пользователем
  public function addToWatchlist($id)
  {
    return response()->json();
  }

  // Удаление сериала из списка просматриваемых текущим пользователем
  public function removeFromWatchlist($id)
  {
    return response()->json();
  }

  // Добавление оценки сериалу текущим пользователем
  public function vote($id, Request $request)
  {
    return response()->json();
  }

  // Запрос на добавление сериала на сайт
  public function request(Request $request)
  {
    return response()->json();
  }
}
