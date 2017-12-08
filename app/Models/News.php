<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class News extends Model
{

    const LIMIT = 10;

    const TYPE_NEWS = 'news';

    const TYPE_INTRODUCE = 'introduce';

    const TYPE_DOCUMENT = 'document';

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
