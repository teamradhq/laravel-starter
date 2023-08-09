<?php

namespace App\Models;

use App\Exceptions\ApplicationException;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class NavLink extends Model implements Sortable
{
    use HasFactory;
    use SortableTrait;

    public $timestamps = false;

    protected $fillable = [
        'title',
        'group',
        'url',
        'route_name',
        'route_parameters',
        'is_guest_link_only',
        'is_auth_link_only',
        'order',
    ];

    protected $appends = [
        'href',
    ];

    protected $hidden = [
        'url',
        'route_name',
        'route_parameters',
    ];

    protected $casts = [
        'route_parameters' => 'array',
        'is_guest_link_only' => 'boolean',
        'is_auth_link_only' => 'boolean',
    ];

    public function buildSortQuery(): Builder
    {
        return static::query()->where('group', $this->group);
    }

    public function href(): Attribute
    {
        return Attribute::make(
            get: static function (mixed $value, array $attributes) {
                if ($attributes['url']) {
                    return $attributes['url'];
                }

                if ($attributes['route_name']) {
                    return route($attributes['route_name'], $attributes['route_parameters'] ?: null);
                }

                throw new ApplicationException('No URL or route name provided for nav link.');
            }
        );
    }

    public function scopeGroup(Builder $query, string $group): Builder
    {
        return $query->where('group', $group);
    }

    public function scopeGuest(Builder $query): Builder
    {
        return $query->where('is_guest_link_only', true)
            ->orWhere('is_auth_link_only', false);
    }

    public function scopeAuth(Builder $query): Builder
    {
        return $query->where('is_auth_link_only', true)
            ->orWhere('is_guest_link_only', false);
    }
}
