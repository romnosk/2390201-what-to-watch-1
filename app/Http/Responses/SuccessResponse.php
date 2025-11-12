<?php

namespace App\Http\Responses;

/**
 * Класс для формирования успешного JSON-ответа.
 */
class SuccessResponse extends BaseResponse
{
  /**
   * Конструктор класса.
   * Создаёт успешный ответ в формате { "data": [...] }.
   *
   * @param mixed $data Данные для возврата (массив, коллекция, модель и т.д.)
   * @param int $statusCode HTTP-код ответа (по умолчанию 200)
   */
  public function __construct(
    mixed $data = [],
    int $statusCode = 200
  ) {
    parent::__construct($data, $statusCode);
  }

  /**
   * Формирует структуру JSON-ответа для успешного выполнения.
   *
   * @return array|null
   */
  protected function makeResponseData(): ?array
  {
    return [
      'data' => $this->prepareData(),
    ];
  }
}
