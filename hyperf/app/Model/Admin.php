<?php

namespace App\Model;

use Hyperf\DbConnection\Model\Model;

class Admin extends Model
{

    protected ?string $table = 'admin';

    protected array $fillable = [];

    protected string $primaryKey = 'id';

    public bool $timestamps = false;

    protected array $casts = ['id' => 'integer', 'is_admin' => 'integer', 'sex' => 'integer', 'sort' => 'integer', 'status' => 'integer',];
}
