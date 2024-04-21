<?php

namespace App\Model;

use Hyperf\DbConnection\Model\Model;

class Banner extends Model
{

    protected ?string $table = 'banner';

    protected array $fillable = [];

    protected string $primaryKey = 'id';

    public bool $timestamps = false;

    protected array $casts = ['id' => 'integer', 'sort' => 'integer',];
}
