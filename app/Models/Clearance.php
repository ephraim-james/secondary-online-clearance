<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Clearance extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'student_id',
        'name',
        'registration_number',
        'block_number',
        'room_number',
        'level',
        'librarian',
        'bursar',
        'class_teacher',
        'matron_patron',
        'store_keeper',
        'academic_master',
        'head_master',
    ];

    protected $searchableFields = ['*'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function clears()
    {
        return $this->hasMany(Clear::class);
    }

    public function completed_clears()
    {
        $clears = $this->hasMany(Clear::class)->where('status', '1');
        if ($clears->count() == 7) {
            return true;
        } else {
            return false;
        }
    }

    public function pending()
    {
        return $this->hasMany(Clear::class)->where('status', '0')->count();
    }

    public function cleared()
    {
        return $this->hasMany(Clear::class)->where('status', '1')->count();
    }
}