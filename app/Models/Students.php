<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Students extends Model
{
    protected $table = "students";
    protected $fillable = ["student_name", "gender", "birthday", "classes_id"];

    public $timestamps = true;

    public function myClass(): BelongsTo {
        return $this->belongsTo(Classes::class);
    }
}
