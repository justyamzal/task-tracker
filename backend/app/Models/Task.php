<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
     use SoftDeletes;

    protected $fillable = [
        'project_id','category_id','created_by','deleted_by',
        'title','description','due_date'
    ];

    protected $casts = [
        'due_date' => 'date:Y-m-d',
    ];

    public function project(): BelongsTo {
        return $this->belongsTo(Project::class);
    }

    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }
}
