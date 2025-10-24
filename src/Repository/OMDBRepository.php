<?php

namespace Romnosk\Repository;

use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Реализация репозитория, использующая OMDB API.
 */
class OMDBRepository implements OMDBRepositoryInterface
{
  private ClientInterface $httpClient;
  private RequestFactoryInterface $requestFactory;
  private string $apiKey;
  private string $baseUrl;

  /**
   * Конструктор.
   *
   * @param ClientInterface $httpClient PSR-18 HTTP клиент.
   * @param RequestFactoryInterface $requestFactory PSR-17 фабрика запросов.
   * @param string $apiKey Ключ доступа к OMDB API.
   * @param string $baseUrl Базовый URL API (по умолчанию: http://www.omdbapi.com).
   */
  public function __construct(
    ClientInterface $httpClient,
    RequestFactoryInterface $requestFactory,
    string $apiKey,
    string $baseUrl = 'http://www.omdbapi.com'
  ) {
    $this->httpClient = $httpClient;
    $this->requestFactory = $requestFactory;
    $this->apiKey = $apiKey;
    $this->baseUrl = rtrim($baseUrl, '/');
  }

  /**
   * {@inheritDoc}
   */
  public function getFilmInformation(string $imdbId): ?array
  {
    $response = $this->fetchMovieFromApi($imdbId);
    return $this->parseApiResponse($response);
  }

  /**
   * Выполняет HTTP-запрос к OMDB API для получения данных о фильме.
   *
   * @param string $imdbId IMDB ID фильма.
   * @return ResponseInterface Ответ от API.
   */
  private function fetchMovieFromApi(string $imdbId): ResponseInterface
  {
    $uri = $this->baseUrl . '?apikey=' . urlencode($this->apiKey) . '&i=' . urlencode($imdbId);
    $request = $this->requestFactory->createRequest('GET', $uri);
    return $this->httpClient->sendRequest($request);
  }

  /**
   * Парсит ответ от OMDB API и возвращает данные фильма или null при ошибке.
   *
   * @param ResponseInterface $response Ответ от HTTP-клиента.
   * @return array|null Ассоциативный массив с данными фильма или null.
   */
  private function parseApiResponse(ResponseInterface $response): ?array
  {
    if ($response->getStatusCode() !== 200) {
      return null;
    }

    $data = json_decode($response->getBody()->getContents(), true);
    if (!isset($data['Response']) || $data['Response'] !== 'True') {
      return null;
    }

    return $data;
  }
}
