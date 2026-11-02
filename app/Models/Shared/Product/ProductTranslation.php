<?php

namespace App\Models\Shared\Product;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $product_id
 * @property string $locale
 * @property string $name
 * @property string $slug
 * @property string|null $short_description
 * @property string|null $description
 * @property string|null $meta_title
 * @property string|null $meta_description
 */
#[Fillable(['name', 'slug', 'short_description', 'description', 'meta_title', 'meta_description'])]
class ProductTranslation extends Model
{
    public $timestamps = false;
}
