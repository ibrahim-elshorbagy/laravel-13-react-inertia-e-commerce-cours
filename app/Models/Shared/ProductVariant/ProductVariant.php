<?php

namespace App\Models\Shared\ProductVariant;

use App\Models\Shared\Product\Product;
use App\Models\Shared\ProductAttribute\ProductAttributeValue;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;
use App\Models\Shared\Product\ProductImage;
use Illuminate\Database\Eloquent\Relations\HasMany;
/**
 * @property int $id
 * @property int $product_id
 * @property string $sku
 * @property numeric-string $price
 * @property int $stock
 * @property numeric-string|null $weight
 * @property bool $is_default
 * @property bool $is_active
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read string $name
 * @property-read Product $product
 * @property-read Collection<int, ProductAttributeValue> $optionValues
 */
#[Fillable([
    'product_id', 'sku', 'price', 'stock',
    'weight', 'is_default', 'is_active',
])]
class ProductVariant extends Model
{
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
            'weight' => 'decimal:3',
            'is_default' => 'boolean',
            'is_active' => 'boolean',
        ];
    }

    /** @return BelongsTo<Product, $this> */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /** @return BelongsToMany<ProductAttributeValue, $this> */
    public function optionValues(): BelongsToMany
    {
        return $this->belongsToMany(
            ProductAttributeValue::class,   // the related model: the values on the other side (Red, M, 5)
            'variant_option_values',        // the pivot table that links variants to values
            'product_variant_id',           // pivot column pointing to THIS model (the variant)
            'product_attribute_value_id'    // pivot column pointing to the RELATED model (the value)
        );
    }

    /** @return HasMany<ProductImage, $this> */
    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

}
