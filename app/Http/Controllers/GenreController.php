<?php

namespace App\Http\Controllers;

use App\Http\Responses\BaseResponce;
use App\Http\Responses\FailResponce;
use App\Http\Responses\SuccessResponse;
use Illuminate\Http\Request;
use Exception;

class GenreController extends Controller
{
  // Получение списка жанров
  public function index(): BaseResponce
  {
    try {
      $data = []; // получаем список жанров
      return new SuccessResponse($data);
    } catch (Exception $e) {
      return new FailResponce([], $e->getMessage());
    }
  }
}
