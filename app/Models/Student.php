<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Scout\Searchable;
use Illuminate\Mail\Attachment;
class Student extends Model
{
    use HasFactory, Searchable, Notifiable;
    protected $fillable = ['student_name', 'student_email', 'course_id', 'user_id', 'status', 'student_dob', 'admission_date', 'student_phone', 'student_address', 'student_city', 'student_state', 'student_zip', 'student_country', 'roll_no', 'student_image', 'year_of_study', 'paid_status', 'paid_fees'];

    public function routeNotificationForMail($notification)
    {
        // Return email address and name...
        return [$this->student_email => $this->student_name];
    }

    public function withDelay($notifiable)
    {
        return [
            'mail' => now()->addMinutes(1),
            'sms' => now()->addMinutes(10),
        ];
    }
    // public function toMailAttachment()
    // {
    //     return Attachment::fromPath(public_path('storage'));
    // }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
