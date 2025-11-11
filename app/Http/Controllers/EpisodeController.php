<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EpisodeController extends Controller
{
  // Получение списка эпизодов сериала
  public function index($showId)
  {
    return response()->json();
  }

  // Получение информации об эпизоде $id
  public function show($id)
  {
    return response()->json();
  }

  // Добавление эпизода $id в список просмотренных
  public function markAsWatched($id)
  {
    return response()->json();
  }

  // Удаление эпизода $id из списка просмотренных
  public function removeFromWatched($id)
  {
    return response()->json();
  }

  // Получение списка не просмотренных эпизодов для сериала $showId
  public function getUnwatchedEpisodes($showId)
  {
    return response()->json();
  }
}
