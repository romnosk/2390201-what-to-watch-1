<?php

namespace Romnosk\Repository;

/**
 * Интерфейс репозитория для получения данных о фильме по IMDB ID.
 */
interface OMDBRepositoryInterface
{
  /**
   * Возвращает ассоциативный массив с данными фильма или null, если не найден.
   *
   * @param string $imdbId IMDB ID фильма.
   * @return array|null
   */
  public function getFilmInformation(string $imdbId): ?array;
}
