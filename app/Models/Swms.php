<?php

namespace App\Models;

use App\Models\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Swms extends Model
{
    use HasFactory;

    protected $fillable = [
        'swms_name',
        'project_id',
        'swms_filepath',
        'version',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    // public function documents()
    // {
    //     return $this->hasMany(Document::class);
    // }

    // public function signatures()
    // {
    //     return $this->hasMany(Signature::class);
    // }
}
