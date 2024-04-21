<?php 
declare(strict_types=1);

namespace App\Model;

use Hyperf\DbConnection\Model\Model;

class Lang extends Model {

    protected ?string $table = 'lang';

    protected array $fillable = [];

    protected string $primaryKey = 'id';

    public bool $timestamps = false;

    protected array $casts = ['id' => 'integer','sort' => 'integer',];
}
