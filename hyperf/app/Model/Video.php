<?php 
declare(strict_types=1);

namespace App\Model;

use Hyperf\DbConnection\Model\Model;

class Video extends Model {

    protected ?string $table = 'video';

    protected array $fillable = [];

    protected string $primaryKey = 'id';

    public bool $timestamps = false;

    protected array $casts = ['id' => 'integer','admin_id' => 'integer','count' => 'integer','is_local' => 'integer','is_show' => 'integer','sort' => 'integer',];
}
