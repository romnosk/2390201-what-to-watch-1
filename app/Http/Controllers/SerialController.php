<?php

namespace App\Http\Controllers;

use App\Http\Responses\BaseResponce;
use App\Http\Responses\FailResponce;
use App\Http\Responses\SuccessResponse;
use Illuminate\Http\Request;
use Exception;

// Контроллер для работы с сериалами
class SerialController extends Controller
{
  // Получение списка сериалов
  public function index(Request $request): BaseResponce
  {
    try {
      $data = []; // получаем список сериалов
      return new SuccessResponse($data);
    } catch (Exception $e) {
      return new FailResponce([], $e->getMessage());
    }
  }

  // Получение информации о сериале
  public function show($id): BaseResponce
  {
    try {
      $data = []; // получаем информацию о сериале
      return new SuccessResponse($data);
    } catch (Exception $e) {
      return new FailResponce([], $e->getMessage());
    }
  }

  // Добавление сериала в список просматриваемых текущим пользователем
  public function addToWatchlist($id): BaseResponce
  {
    try {
      $data = []; // добавляем сериал в список просматриваемых
      return new SuccessResponse($data);
    } catch (Exception $e) {
      return new FailResponce([], $e->getMessage());
    }
  }

  // Удаление сериала из списка просматриваемых текущим пользователем
  public function removeFromWatchlist($id): BaseResponce
  {
    try {
      $data = []; // удаляем сериал из списка просматриваемых
      return new SuccessResponse($data);
    } catch (Exception $e) {
      return new FailResponce([], $e->getMessage());
    }
  }

  // Добавление оценки сериалу текущим пользователем
  public function vote($id, Request $request): BaseResponce
  {
    try {
      $data = []; // добавляем оценку сериалу
      return new SuccessResponse($data);
    } catch (Exception $e) {
      return new FailResponce([], $e->getMessage());
    }
  }

  // Запрос на добавление сериала на сайт
  public function request(Request $request): BaseResponce
  {
    try {
      $data = []; // делаем запрос о добавлении сериала на сайт
      return new SuccessResponse($data);
    } catch (Exception $e) {
      return new FailResponce([], $e->getMessage());
    }
  }
}
