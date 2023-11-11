<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Module
 *
 * @property int $id
 * @property string $name
 * @property string $icon
 * @property int $visible
 * @property int $type
 * @property text $payload
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection<int, Permission> $permissions
 * @property-read int|null $permissions_count
 * @method static Builder|Module newModelQuery()
 * @method static Builder|Module newQuery()
 * @method static Builder|Module query()
 * @method static Builder|Module whereCreatedAt($value)
 * @method static Builder|Module whereIcon($value)
 * @method static Builder|Module whereId($value)
 * @method static Builder|Module whereName($value)
 * @method static Builder|Module wherePermissionName($value)
 * @method static Builder|Module whereUpdatedAt($value)
 * @method static Builder|Module whereVisble($value)
 * @method static Builder|Module whereType($value)
 * @method static Builder|Module wherePayload($value)
 * @method static Builder|Module wherePermissionId($value)
 * @method static Builder|Module whereVisible($value)
 * @mixin Eloquent
 */
class Module extends Model
{
    protected $guarded = [];
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }


    public static function getUserRoles(): Collection{
        $user = auth()->user();
        $userRole = $user->role;

        $queryModuleIds = \DB::table('module_role')
            ->select(['module_id'])
            ->where('role_id','=',$userRole->id)->get();

        $modulesIds = [];
        foreach ($queryModuleIds as $module){
            $modulesIds[] = $module->module_id;
        }
        return self::whereIn('id',$modulesIds)->get();
    }
}
