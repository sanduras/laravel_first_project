<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Article extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['title','meta_description', 'description','key_words'];
    protected $fillable = ['title','meta_description','image','description','key_words','slug'];
}
