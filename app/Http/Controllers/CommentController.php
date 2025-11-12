<?php

namespace App\Http\Controllers;

use App\Http\Responses\BaseResponce;
use App\Http\Responses\FailResponce;
use App\Http\Responses\SuccessResponse;
use Illuminate\Http\Request;
use Exception;

class CommentController extends Controller
{
  // Получение списка комментариев эпизода $episodeId
  public function index($episodeId): BaseResponce
  {
    try {
      $data = []; // получаем список комментариев
      return new SuccessResponse($data);
    } catch (Exception $e) {
      return new FailResponce([], $e->getMessage());
    }
  }

  // Добавление комментария к эпизоду $episodeId
  public function store($episodeId, Request $request): BaseResponce
  {
    try {
      $data = []; // добавляем комментарий к эпизоду
      return new SuccessResponse($data, 201);
    } catch (Exception $e) {
      return new FailResponce([], $e->getMessage());
    }
  }

  // Удаление комментария $commentId
  public function destroy($commentId): BaseResponce
  {
    try {
      $data = []; // удаляем комментарий
      return new SuccessResponse($data);
    } catch (Exception $e) {
      return new FailResponce([], $e->getMessage());
    }
  }
}
