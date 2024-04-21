<?php

namespace App\Model;

use Hyperf\DbConnection\Model\Model;

class Config extends Model
{

    protected ?string $table = 'config';

    protected array $fillable = [];

    protected string $primaryKey = 'id';

    public bool $timestamps = false;

    protected array $casts = ['id' => 'integer',];
}
