<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['sku', 'name', 'description', 'image_path', 'price', 'subcategory_id', 'stock'];

    protected function image() :Attribute {
        return Attribute::make(
          get: fn() => Storage::url($this->image_path)
        );
    }

        // RELACION UNO A MUCHOS INVERSA

        public function subcategory(){
            return $this->belongsTo(Subcategory::class);
        }
       
    // relacion uno a muchos

    public function variants(){
        return $this->hasMany(Variant::class);
    }

    // relacion muchos a muchos

    public function options(){
        return $this->belongsToMany(Option::class)
                    ->using(OptionProduct::class)
                    ->withPivot('features')
                    ->withTimestamps();
    }
}
