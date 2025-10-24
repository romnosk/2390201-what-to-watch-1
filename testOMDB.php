<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once './vendor/autoload.php';

use Romnosk\Repository\OMDBRepository;
use Http\Discovery\Psr18ClientDiscovery;
use Http\Discovery\Psr17FactoryDiscovery;

// Замените на реальный API-ключ от OMDB
$apiKey = 'api_ключ';

$httpClient = Psr18ClientDiscovery::find();
$requestFactory = Psr17FactoryDiscovery::findRequestFactory();

$repository = new OMDBRepository($httpClient, $requestFactory, $apiKey);

// Пример IMDB ID: tt0111162 — "She Led Two Lives"
$imdbId = 'tt0111162';
$result = $repository->getFilmInformation($imdbId);
?>

<html>
<body>
<?php
if ($result) {
  echo "Название: " . $result['Title'] . "<br>";
  echo "Год: " . $result['Year'] . "<br>";
} else {
  echo "Фильм не найден или ошибка API.<br>";
}
?>
</body>
</html>
