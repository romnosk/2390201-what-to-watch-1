<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Модель жанра
 *
 * @property int $id
 * @property string $imdb_id
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 */
class Genre extends Model
{
  /**
   * Имя таблицы в базе данных.
   *
   * @var string
   */
  protected $table = 'genres';

  /**
   * Атрибуты, которые можно массово заполнять.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'imdb_id',
    'title',
  ];

  /**
   * Получить сериалы, связанные с этим жанром.
   */
  public function serials()
  {
    return $this->belongsToMany(Serial::class, 'genre_serial');
  }
}
