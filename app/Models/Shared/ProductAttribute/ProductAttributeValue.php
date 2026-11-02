<?php

namespace App\Models\Shared\ProductAttribute;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;
use App\Models\Shared\ProductVariant\ProductVariant;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $id
 * @property int $product_attribute_id
 * @property string $code
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $name
 * @property-read ProductAttribute $productAttribute
 */
#[Fillable(['product_attribute_id', 'code'])]
class ProductAttributeValue extends Model implements TranslatableContract
{
    use Translatable;

    /** @var list<string> */
    public array $translatedAttributes = ['name'];

    /** @return BelongsTo<ProductAttribute, $this> */
    public function productAttribute(): BelongsTo
    {
        return $this->belongsTo(ProductAttribute::class, 'product_attribute_id');
    }


    /** @return BelongsToMany<ProductVariant, $this> */
    public function variants(): BelongsToMany
    {
        return $this->belongsToMany(
            ProductVariant::class,          // the related model: the variants on the other side
            'variant_option_values',        // the pivot table that links variants to values
            'product_attribute_value_id',   // pivot column pointing to THIS model (the value)
            'product_variant_id'            // pivot column pointing to the RELATED model (the variant)
        );
    }
}
