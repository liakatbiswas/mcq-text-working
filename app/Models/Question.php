<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'school_class_id',
        'subject_id',
        'chapter_id',
        'passage_id',
        'question_type',
        'name',
        'ans_a',
        'ans_b',
        'ans_c',
        'ans_d',
        'correct_ans',
        'difficulty',
        'explanation',
    ];

    public function schoolClass()
    {
        return $this->belongsTo(SchoolClass::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }

    public function passage()
    {
        return $this->belongsTo(Passage::class);
    }
}
