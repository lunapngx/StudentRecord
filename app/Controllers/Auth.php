<?php namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function index()
    {
        $action = $this->request->getGet('action');
        return view('auth_view', ['action' => $action]);
    }

    public function login()
    {
        $session = session();
        $model = new UserModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $model->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            $session->set([
                'user_id' => $user['user_id'],
                'email'   => $user['email'],
                'role'    => $user['role'],
                'logged_in' => true,
            ]);
            return redirect()->to('/home');
        } else {
            return redirect()->back()->with('error', 'Invalid credentials');
        }
    }

    public function register()
    {
        $model = new UserModel();
        $data = [
            'name'     => $this->request->getPost('name'),
            'email'    => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role'     => 'user'
        ];

        try {
            $model->insert($data);
            return redirect()->to('/auth?action=login')->with('success', 'Registration successful. Please login.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
