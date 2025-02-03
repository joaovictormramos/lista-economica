<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function package(): BelongsTo
    {
        return $this->belongsTo(Package::class);
    }

    public function section(): BelongsTo
    {
        return $this->belongsTo(Section::class);
    }

    public function stores(): BelongsToMany
    {
        return $this->belongsToMany(Store::class)->withPivot('product_price');
    }

    public function lists(): BelongsToMany
    {
        return $this->belongsToMany(Lister::class);
    }

    public function getDetails()
    {
        return [
            'name' => $this->product_name,
            'brand' => $this->brand,
            'section' => $this->section,
            'package' => $this->package,
            'measurement' => $this->product_measurement . ' ' . $this->product_unity_measurement,
        ];
    }

}
