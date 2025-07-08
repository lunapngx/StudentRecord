<?php namespace App\Models;

use CodeIgniter\Model;

class StudentModel extends Model
{
    protected $table = 'students';
    protected $primaryKey = 'student_id';

    protected $allowedFields = [
        'user_id', 'given_name', 'middle_name', 'surname', 'course'
    ];
    protected $returnType = 'array';
}
