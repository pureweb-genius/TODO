<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Todo extends Model
{
    use HasFactory;
    protected $fillable = ['header', 'description', 'user_id', 'status'];

    public function save(array $options = [])
    {
        // If no author has been assigned, assign the current user's id as the author of the post
        if (!$this->user_id && Auth::user()) {
            $this->user_id = Auth::user()->id;
        }

        parent::save();
    }

    protected static function boot()
    {
        parent::boot();

        // Customize your own rule here!
        if (\Request::is('management/*') && Auth::user()->canBlogSolo()) {
            static::addGlobalScope('author', function (Builder $builder) {
                $builder->where('author_id', '=', Auth::user()->id);
            });
        }
    }
}
