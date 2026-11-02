<?php

namespace App\Models\Shared\Brand;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $brand_id
 * @property string $locale
 * @property string $name
 * @property string $slug
 * @property string|null $description
 * @property string|null $meta_title
 * @property string|null $meta_description
 */
#[Fillable(['name', 'slug', 'description', 'meta_title', 'meta_description'])]
class BrandTranslation extends Model
{
    public $timestamps = false;
}
