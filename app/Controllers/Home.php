<?php namespace App\Controllers;

use App\Models\StudentModel;
use CodeIgniter\Controller;

class Home extends BaseController
{
    public function index()
    {
        $session = session();

        if (!$session->get('user_id')) {
            return redirect()->to('/auth?action=login');
        }

        $studentModel = new StudentModel();
        $userId = $session->get('user_id');

        $data['students'] = $studentModel->where('user_id', $userId)->findAll();
        $data['total'] = count($data['students']);
        $data['title'] = 'Student Dashboard';

        return view('dashboard', $data);
    }
}
