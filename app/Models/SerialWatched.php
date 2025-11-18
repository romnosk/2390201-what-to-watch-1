<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Модель просмотра сериала пользователем
 *
 * @property int $id
 * @property int $user_id
 * @property int $serial_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 */
class SerialWatched extends Model
{
  /**
   * Имя таблицы в базе данных.
   *
   * @var string
   */
  protected $table = 'serials_watched';

  /**
   * Атрибуты, которые можно массово заполнять.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'user_id',
    'serial_id',
  ];

  /**
   * Получить пользователя, который посмотрел сериал.
   */
  public function user()
  {
    return $this->belongsTo(User::class);
  }

  /**
   * Получить сериал, который был просмотрен.
   */
  public function serial()
  {
    return $this->belongsTo(Serial::class);
  }
}
