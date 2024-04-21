<?php

namespace App\Model;

use Hyperf\DbConnection\Model\Model;

class Seo extends Model
{

    protected ?string $table = 'seo';

    protected array $fillable = [];

    protected string $primaryKey = 'id';

    public bool $timestamps = false;

    protected array $casts = ['id' => 'integer', 'is_show' => 'integer', 'sort' => 'integer',];
}
