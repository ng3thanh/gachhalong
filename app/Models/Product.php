<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{

    const LIMIT = 10;
    
    const SHOWING = 1;

    const NOT_SHOW = 2;

    const END_TIME = 3;

    const DELETED = 4;
    
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
        'status',
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
