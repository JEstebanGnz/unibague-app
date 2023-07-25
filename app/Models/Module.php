<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Module
 *
 * @property int $id
 * @property string $name
 * @property string $permission_name
 * @property string $icon
 * @property int $visble
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @method static \Illuminate\Database\Eloquent\Builder|Module newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Module newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Module query()
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module wherePermissionName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereVisble($value)
 * @mixin \Eloquent
 */
class Module extends Model
{
    public function permissions(): HasMany
    {
        return $this->hasMany(Permission::class);
    }
}
