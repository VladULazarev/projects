<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    /**
     * Table 'articles' has relation 'one to many' with table 'users'
     *
     * So, we need to find 'author' and better to name method as 'author()' not user()
     * and set attr(column name) 'user_id'
     * Now we can find an author like so: App\Models\Article::find(1)->author;
     * Not like: App\Models\Article::find(1)->user;
     * It is more readable way
     *
     * @return array the user(author) 'data' how wrote the current article
     */
     public function author()
     {
         return $this->belongsto(User::class, 'user_id');
     }

     // Allow mass assignments
     protected $guarded = [];

     // Set 'slug' column instead of 'id'
     public function getRouteKeyName()
     {
         return 'slug';
     }

     // Set path to the current article
     public function path()
     {
         return route('articles.show', $this);
     }
}
