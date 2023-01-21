<?php

namespace App\Models;

use App\Models\Homework;
use App\Models\Attendance;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Curriculum extends Model
{
    protected $table = 'curriculums';
    use HasFactory;

    protected $fillable = [
        'name',
        'course_id'
    ];

    public function homeworks(){
        return $this->hasMany(Homework::class);
    }

    public function attendances(){
        return $this->hasMany(Attendance::class);
    }

    public function notes() {
        return $this->belongsToMany(Note::class, 'curriculum_note');
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function presentStudents() {
        return Attendance::where('curriculum_id', $this->id)->count();
    }


}
