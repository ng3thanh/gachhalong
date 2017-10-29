<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    const TYPE_NEWS = 'news';
    const TYPE_INTRODUCE = 'introduce';
    const TYPE_DOCUMENT = 'document';
    
    use Notifiable;
    use SoftDeletes;
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'news';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'type',
        'image',
        'content',
        'publish_start',
        'publish_end',
        'tag'
    ];
}
