<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    const MAIN_MENU = 0;
    
    use Notifiable;
    use SoftDeletes;
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'menus';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'parent_id'
    ];
    
    public function menuProduct()
    {
        return $this->hasMany(Product::class, 'menu_id');
    }
    
    public function menuProductImage()
    {
        return $this->hasManyThrough(Product::class, Image::class);
    }
}
