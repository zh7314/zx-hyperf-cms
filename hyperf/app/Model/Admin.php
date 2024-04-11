<?php

declare(strict_types=1);

namespace App\Model;

use Hyperf\DbConnection\Model\Model;

/**
 * @property int $id 
 * @property string $name 
 * @property string $password 
 * @property string $salt 
 * @property int $sex 
 * @property string $email 
 * @property string $mobile 
 * @property string $login_ip 
 * @property int $status 
 * @property string $avatar 
 * @property string $real_name 
 * @property string $token_time 
 * @property string $admin_group_ids 
 * @property int $is_admin 
 * @property int $sort 
 * @property string $create_at 
 * @property string $update_at 
 * @property string $token 
 */
class Admin extends Model
{
    /**
     * The table associated with the model.
     */
    protected ?string $table = 'admin';

    /**
     * The attributes that are mass assignable.
     */
    protected array $fillable = [];

    /**
     * The attributes that should be cast to native types.
     */
    protected array $casts = ['id' => 'integer', 'sex' => 'integer', 'status' => 'integer', 'is_admin' => 'integer', 'sort' => 'integer'];
}
