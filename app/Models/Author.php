<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Author extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nama',
        'accupation',
        'avatar',
        'slug',
    ];

    public function setNamaAttribute($value)
    {
        $this->attributes['nama'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function news(): HasMany
    {
        return $this->hasMany(ArtikelNews::class);
    }
}
