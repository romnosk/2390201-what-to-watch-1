<?php

namespace App\Http\Controllers;

use App\Http\Responses\BaseResponce;
use App\Http\Responses\FailResponce;
use App\Http\Responses\SuccessResponse;
use Illuminate\Http\Request;
use Exception;

class AuthController extends Controller
{
  // Регистрация пользователя
  public function register(Request $request): BaseResponce
  {
    try {
      $data = []; // регистрируем пользователя
      return new SuccessResponse($data);
    } catch (Exception $e) {
      return new FailResponce([], $e->getMessage());
    }
  }

  // Аутентификация пользователя
  public function login(Request $request): BaseResponce
  {
    try {
      $data = []; // аутентифицируем пользователя
      return new SuccessResponse($data);
    } catch (Exception $e) {
      return new FailResponce([], $e->getMessage());
    }
  }

  // Выход пользователя
  public function logout(Request $request): BaseResponce
  {
    try {
      // пустой ответ для выхода
      return new SuccessResponse([]);
    } catch (Exception $e) {
      return new FailResponce([], $e->getMessage());
    }
  }
}
