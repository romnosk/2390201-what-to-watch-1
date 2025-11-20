<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Модель комментария
 *
 * @property int $id
 * @property int $episode_id
 * @property int $user_id
 * @property string $description
 * @property int|null $parent_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 */
class Comment extends Model
{
  /**
   * Имя таблицы в базе данных.
   *
   * @var string
   */
  protected $table = 'comments';

  /**
   * Атрибуты, которые можно заполнять массово.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'episode_id',
    'user_id',
    'description',
    'parent_id',
  ];

  /**
   * Получить эпизод, к которому относится комментарий.
   */
  public function episode()
  {
    return $this->belongsTo(Episode::class);
  }

  /**
   * Получить пользователя, оставившего комментарий.
   */
  public function user()
  {
    return $this->belongsTo(User::class);
  }

  /**
   * Получить родительский комментарий (если это ответ).
   */
  public function parent()
  {
    return $this->belongsTo(Comment::class, 'parent_id');
  }

  /**
   * Получить дочерние комментарии (ответы на этот комментарий).
   */
  public function children()
  {
    return $this->hasMany(Comment::class, 'parent_id');
  }
}
