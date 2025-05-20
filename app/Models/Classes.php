<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Classes extends Model
{
    protected $table = "classes";
    protected $fillable = ["class_name", "department"];

    public $timestamps = true;

    public function students(): HasMany {
        return $this->hasMany(Students::class);
    }
}