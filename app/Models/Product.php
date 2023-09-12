<?php

namespace App\Models;

use App\Models\User;
use App\Models\Rating;
use App\Models\Category;
use Maize\Markable\Markable;
use Maize\Markable\Models\Favorite;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, Markable;

    protected $guarded = ['id'];

    protected static $marks = [
        Favorite::class,
    ];
    /**
     * Get the category that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function averageRating()
    {
        return $this->ratings()->avg('rating');
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['category'] ?? false, function ($query, $category) {
            return $query->whereHas('category', function ($query) use ($category) {
                $query->where('slug', $category);
            });
        });
    }
}
