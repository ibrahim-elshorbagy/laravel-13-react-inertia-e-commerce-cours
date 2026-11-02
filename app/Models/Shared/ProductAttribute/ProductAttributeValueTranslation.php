<?php

namespace App\Models\Shared\ProductAttribute;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $product_attribute_value_id
 * @property string $locale
 * @property string $name
 */
#[Fillable(['name'])]
class ProductAttributeValueTranslation extends Model
{
    public $timestamps = false;
}
