<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use Notifiable;
    use SoftDeletes;
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'menu_id',
        'name',
        'price',
        'last_price',
        'description',
        'star',
        'vote',
        'digital',
        'information',
        'tag',
        'publish_start',
        'publish_end'
    ];
    
    public function productMenu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }
    
    public function productImage()
    {
        return $this->hasMany(Image::class, 'product_id');
    }
}
