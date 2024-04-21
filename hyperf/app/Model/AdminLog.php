<?php

namespace App\Model;

use Hyperf\DbConnection\Model\Model;

class AdminLog extends Model
{

    protected ?string $table = 'admin_log';

    protected array $fillable = [];

    protected string $primaryKey = 'id';

    public bool $timestamps = false;

    protected array $casts = ['id' => 'integer',];
}
