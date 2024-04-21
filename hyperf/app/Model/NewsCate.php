<?php 
declare(strict_types=1);

namespace App\Model;

use Hyperf\DbConnection\Model\Model;

class NewsCate extends Model {

    protected ?string $table = 'news_cate';

    protected array $fillable = [];

    protected string $primaryKey = 'id';

    public bool $timestamps = false;

    protected array $casts = ['id' => 'integer','is_show' => 'integer','sort' => 'integer',];
}
