<?php

namespace App\Models\Shared\ProductAttribute;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $code
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $name
 * @property string|null $unit
 * @property-read Collection<int, ProductAttributeValue> $values
 */
#[Fillable(['code'])]
class ProductAttribute extends Model implements TranslatableContract
{
    use Translatable;

    /** @var list<string> */
    public array $translatedAttributes = ['name', 'unit'];

    /** @return HasMany<ProductAttributeValue, $this> */
    public function values(): HasMany
    {
        return $this->hasMany(ProductAttributeValue::class);
    }
}
