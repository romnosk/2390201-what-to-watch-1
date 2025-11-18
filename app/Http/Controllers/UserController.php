<?php

namespace App\Http\Controllers;

use App\Http\Responses\BaseResponce;
use App\Http\Responses\FailResponce;
use App\Http\Responses\SuccessResponse;
use Illuminate\Http\Request;
use Exception;

class UserController extends Controller
{
  // Получение списка просматриваемых сериалов пользователя
  public function watchlist(): BaseResponce
  {
    try {
      $data = []; // получаем список просматриваемых сериалов пользователя
      return new SuccessResponse($data);
    } catch (Exception $e) {
      return new FailResponce([], $e->getMessage());
    }
  }

  // Обновление профиля пользователя
  public function updateProfile(Request $request): BaseResponce
  {
    try {
      $data = []; // обновляем профиль пользователя
      return new SuccessResponse($data);
    } catch (Exception $e) {
      return new FailResponce([], $e->getMessage());
    }
  }
}
