<?php namespace App\Controllers;

use App\Models\StudentModel;
use CodeIgniter\Controller;

class Student extends BaseController
{
    // Displays the list of students
    public function index()
    {
        $session = session();

        if (!$session->get('user_id')) {
            return redirect()->to('/auth?action=login');
        }

        $studentModel = new StudentModel();
        $userId = $session->get('user_id');

        // Fetch students belonging to the current user
        $data['students'] = $studentModel->where('user_id', $userId)->findAll();
        $data['title'] = 'Student List';

        return view('student/list', $data);
    }

    // Displays the form to add a new student
    public function add()
    {
        $data['title'] = 'Add New Student';
        return view('student/add', $data);
    }

    // Handles the submission for adding a new student
    public function store()
    {
        $session = session();

        if (!$session->get('user_id')) {
            return redirect()->to('/auth?action=login')->with('error', 'You must be logged in to add a student.');
        }

        $studentModel = new StudentModel();

        $data = [
            'user_id' => $session->get('user_id'),
            'given_name' => $this->request->getPost('given_name'),
            'middle_name' => $this->request->getPost('middle_name'),
            'surname' => $this->request->getPost('surname'),
            'course' => $this->request->getPost('course'),
            'year_level' => $this->request->getPost('year_level'),
            'email' => $this->request->getPost('email'),
            'age' => $this->request->getPost('age'),
            'phone_number' => $this->request->getPost('phone_number'),
            'contact_person_name' => $this->request->getPost('contact_person_name'),
            'contact_person_number' => $this->request->getPost('contact_person_number'),
            'address' => $this->request->getPost('address')
        ];

        if (!$studentModel->validate($data)) {
            return redirect()->back()->withInput()->with('errors', $studentModel->errors());
        }

        if ($studentModel->save($data)) {
            return redirect()->to('/student')->with('success', 'Student added successfully!');
        } else {
            return redirect()->back()->withInput()->with('error', 'Failed to add student. Please try again.');
        }
    }

    // Displays the form to edit an existing student
    public function edit($student_id = null)
    {
        $session = session();

        if (!$session->get('user_id')) {
            return redirect()->to('/auth?action=login')->with('error', 'You must be logged in to edit a student.');
        }

        $studentModel = new StudentModel();
        $student = $studentModel->find($student_id);

        if (!$student) {
            return redirect()->to('/student')->with('error', 'Student not found.');
        }

        if ($student['user_id'] !== $session->get('user_id')) {
            return redirect()->to('/student')->with('error', 'You do not have permission to edit this student record.');
        }

        $data['student'] = $student;
        $data['title'] = 'Edit Student';

        return view('student/edit', $data);
    }

    // Handles the submission for updating an existing student
    public function update($student_id = null)
    {
        $session = session();

        if (!$session->get('user_id')) {
            return redirect()->to('/auth?action=login')->with('error', 'You must be logged in to update a student.');
        }

        $studentModel = new StudentModel();

        $existingStudent = $studentModel->find($student_id);
        if (!$existingStudent) {
            return redirect()->to('/student')->with('error', 'Student not found for update.');
        }

        if ($existingStudent['user_id'] !== $session->get('user_id')) {
            return redirect()->to('/student')->with('error', 'You do not have permission to update this student record.');
        }

        $data = [
            'given_name' => $this->request->getPost('given_name'),
            'middle_name' => $this->request->getPost('middle_name'),
            'surname' => $this->request->getPost('surname'),
            'course' => $this->request->getPost('course'),
            'year_level' => $this->request->getPost('year_level'),
            'email' => $this->request->getPost('email'),
            'age' => $this->request->getPost('age'),
            'phone_number' => $this->request->getPost('phone_number'),
            'contact_person_name' => $this->request->getPost('contact_person_name'),
            'contact_person_number' => $this->request->getPost('contact_person_number'),
            'address' => $this->request->getPost('address')
        ];

        if (!$this->validate($studentModel->getValidationRules())) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        if ($studentModel->update($student_id, $data)) {
            return redirect()->to('/student')->with('success', 'Student record updated successfully!');
        } else {
            return redirect()->back()->withInput()->with('error', 'Failed to update student record. Please try again.');
        }
    }

    // Handles the deletion of a student record
    public function delete($student_id = null)
    {
        $session = session();

        if (!$session->get('user_id')) {
            return redirect()->to('/auth?action=login')->with('error', 'You must be logged in to delete a student.');
        }

        $studentModel = new StudentModel();

        if ($studentModel->delete($student_id)) {
            return redirect()->to('/student')->with('success', 'Student record deleted successfully.');
        } else {
            return redirect()->to('/student')->with('error', 'Failed to delete student record.');
        }
    }

    // Full implementation of the details method
    public function details($student_id = null)
    {
        $session = session();

        if (!$session->get('user_id')) {
            return redirect()->to('/auth?action=login');
        }

        $studentModel = new StudentModel();
        $student = $studentModel->find($student_id);

        if (!$student) {
            return redirect()->to('/student')->with('error', 'Student details not found.');
        }

        // Optional: Ensure the student belongs to the logged-in user for security
        if ($student['user_id'] !== $session->get('user_id')) {
            return redirect()->to('/student')->with('error', 'You do not have permission to view this student record.');
        }

        $data['student'] = $student;
        $data['title'] = 'Student Details';

        return view('student/details', $data);
    }
}