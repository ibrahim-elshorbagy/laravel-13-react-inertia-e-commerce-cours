<?php

namespace App\Models\Shared\ProductAttribute;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $product_attribute_id
 * @property string $locale
 * @property string $name
 * @property string|null $unit
 */
#[Fillable(['name', 'unit'])]
class ProductAttributeTranslation extends Model
{
    public $timestamps = false;
}
