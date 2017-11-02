<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    const IS_MAIN_IMAGE = '1';
    const IS_NOT_MAIN_IMAGE = '0';
    
    use Notifiable;
    use SoftDeletes;
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'images';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'name',
        'alt',
        'type',
        'is_main_image'
    ];
    
    public function imageProduct()
    {
        return $this->belongsTo(Product::class, '');
    }
}
