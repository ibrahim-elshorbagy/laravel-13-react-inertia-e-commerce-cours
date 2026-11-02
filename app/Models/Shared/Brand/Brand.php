<?php

namespace App\Models\Shared\Brand;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use App\Models\Shared\Product\Product;
use Illuminate\Database\Eloquent\Relations\HasMany;
/**
 * @property int $id
 * @property string|null $logo
 * @property int $sort_order
 * @property bool $is_active
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $name
 * @property string $slug
 * @property string|null $description
 * @property string|null $meta_title
 * @property string|null $meta_description
 */
#[Fillable(['logo', 'sort_order', 'is_active'])]
class Brand extends Model implements TranslatableContract
{
    use Translatable;

    /** @var list<string> */
    public array $translatedAttributes = ['name', 'slug', 'description', 'meta_title', 'meta_description'];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    /** @return HasMany<Product, $this> */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
