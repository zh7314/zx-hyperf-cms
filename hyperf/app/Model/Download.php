<?php 
declare(strict_types=1);

namespace App\Model;

use Hyperf\DbConnection\Model\Model;

class Download extends Model {

    protected ?string $table = 'download';

    protected array $fillable = [];

    protected string $primaryKey = 'id';

    public bool $timestamps = false;

    protected array $casts = ['id' => 'integer','is_local' => 'integer','is_show' => 'integer','sort' => 'integer',];
}
