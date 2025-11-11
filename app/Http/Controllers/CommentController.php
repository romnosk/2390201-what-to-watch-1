<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
  // Получение списка комментариев эпизода $episodeId
  public function index($episodeId)
  {
    return response()->json();
  }

  // Добавление комментария к эпизоду $episodeId
  public function store($episodeId, Request $request)
  {
    return response()->json([], 201);
  }

  // Удаление комментария $commentId
  public function destroy($commentId)
  {
    return response()->json();
  }
}
