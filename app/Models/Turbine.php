<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Turbine
 *
 * @property int $id
 * @property string $name
 * @property int $blade_grade
 * @property int $rotor_grade
 * @property int $hub_grade
 * @property int $generator_grade
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Turbine newModelQuery()
 * @method static Builder|Turbine newQuery()
 * @method static Builder|Turbine query()
 * @method static Builder|Turbine whereBladeGrade($value)
 * @method static Builder|Turbine whereCreatedAt($value)
 * @method static Builder|Turbine whereGeneratorGrade($value)
 * @method static Builder|Turbine whereHubGrade($value)
 * @method static Builder|Turbine whereId($value)
 * @method static Builder|Turbine whereName($value)
 * @method static Builder|Turbine whereRotorGrade($value)
 * @method static Builder|Turbine whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Turbine extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function inspections(): HasMany
    {
        return $this->hasMany(Inspection::class);
    }
}
