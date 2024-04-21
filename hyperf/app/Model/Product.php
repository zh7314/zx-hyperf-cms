<?php

namespace App\Model;

use Hyperf\DbConnection\Model\Model;

class Product extends Model
{

    protected ?string $table = 'product';

    protected array $fillable = [];

    protected string $primaryKey = 'id';

    public bool $timestamps = false;

    protected array $casts = ['id' => 'integer', 'admin_id' => 'integer', 'is_show' => 'integer', 'product_cate_id' => 'integer', 'sort' => 'integer', 'view_count' => 'integer',];
}
