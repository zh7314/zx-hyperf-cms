<?php

namespace App\Model;

use Hyperf\DbConnection\Model\Model;

class DownloadCate extends Model
{

    protected ?string $table = 'download_cate';

    protected array $fillable = [];

    protected string $primaryKey = 'id';

    public bool $timestamps = false;

    protected array $casts = ['id' => 'integer', 'is_show' => 'integer', 'sort' => 'integer',];
}
