<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use HasFactory, HasUlids, SoftDeletes;

    protected $fillable = ['type_id', 'property_id', 'product_id', 'item_name', 'item_number', 'item_rating', 'signed_at'];

    /**
     * @throws \Exception
     */
    public static function boot(): void
    {
        parent::boot();

        $b = true; $numberCandidate = 10000000;
        while($b === true)
        {
            $numberCandidate = random_int(10000000, 99999999);
            $b = Item::where('cert_id', $numberCandidate)->exists();
        }

        self::creating(function ($model) use ($numberCandidate) {
            $model->cert_id = $numberCandidate;
        });
    }

    public function notes(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Note::class);
    }

    public function product(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function property(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Property::class);
    }
    public function type(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Type::class);
    }
}
