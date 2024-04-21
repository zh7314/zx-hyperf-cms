<?php

namespace App\Model;

use Hyperf\DbConnection\Model\Model;

class File extends Model
{

    protected ?string $table = 'file';

    protected array $fillable = [];

    protected string $primaryKey = 'id';

    public bool $timestamps = false;

    protected array $casts = ['id' => 'integer', 'file_size' => 'integer',];
}
