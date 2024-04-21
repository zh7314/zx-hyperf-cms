<?php

namespace App\Model;

use Hyperf\DbConnection\Model\Model;

class News extends Model
{

    protected ?string $table = 'news';

    protected array $fillable = [];

    protected string $primaryKey = 'id';

    public bool $timestamps = false;

    protected array $casts = ['id' => 'integer', 'admin_id' => 'integer', 'count' => 'integer', 'is_show' => 'integer', 'sort' => 'integer',];
}
