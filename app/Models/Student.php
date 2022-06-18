<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Student extends Model
{
    use HasFactory,Searchable;
    protected $fillable = ['student_name', 'student_email', 'course_id', 'user_id', 'status', 'student_dob', 'admission_date', 'student_phone', 'student_address', 'student_city', 'student_state', 'student_zip', 'student_country', 'roll_no', 'student_image','year_of_study','paid_status','paid_fees'];

    public function user()  
    {
        return $this->belongsTo(User::class);
    }
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
