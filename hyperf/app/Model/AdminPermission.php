<?php 
declare(strict_types=1);

namespace App\Model;

use Hyperf\DbConnection\Model\Model;

class AdminPermission extends Model {

    protected ?string $table = 'admin_permission';

    protected array $fillable = [];

    protected string $primaryKey = 'id';

    public bool $timestamps = false;

    protected array $casts = ['id' => 'integer','hidden' => 'integer','is_menu' => 'integer','sort' => 'integer',];
}
