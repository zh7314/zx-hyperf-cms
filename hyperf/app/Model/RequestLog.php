<?php 
declare(strict_types=1);

namespace App\Model;

use Hyperf\DbConnection\Model\Model;

class RequestLog extends Model {

    protected ?string $table = 'request_log';

    protected array $fillable = [];

    protected string $primaryKey = 'id';

    public bool $timestamps = false;

    protected array $casts = ['id' => 'integer',];
}
