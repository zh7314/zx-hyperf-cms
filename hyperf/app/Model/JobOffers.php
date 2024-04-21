<?php

namespace App\Model;

use Hyperf\DbConnection\Model\Model;

class JobOffers extends Model
{

    protected ?string $table = 'job_offers';

    protected array $fillable = [];

    protected string $primaryKey = 'id';

    public bool $timestamps = false;

    protected array $casts = ['id' => 'integer', 'is_show' => 'integer', 'sort' => 'integer',];
}
