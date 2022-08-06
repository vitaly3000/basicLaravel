<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    // Trait filter
    use Filterable;
    // Использования в фабрике
    use HasFactory;
    // Мягкое удаление
    use SoftDeletes;
    // Название таблицы
    protected $table = 'posts';
    // Выключить защиту от добавления элементов
    protected $guarded = [];
    // Указать какие свойства могут добавить
    //protected $fillable = ['title'];

    function category()
    {
       return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class,'post_tags','post_id','tag_id');
    }
}
