<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'priority', 'project_id'];

    /**
     * Interact with the user's first name.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::createFromFormat('Y-m-d H:i:s', $value)->isoFormat('MMMM Do YYYY, h:mm:ss a'),
        );
    }

    /**
     * Get the project associated to the task.
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
