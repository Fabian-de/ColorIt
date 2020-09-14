<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserColor extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_colors';

      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'color'
    ];
    
}
