<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function login()
    {
        return view('auth/login');
    }

    public function attemptLogin()
{
    $session = session();

    // Ambil input dari form
    $login    = $this->request->getPost('login'); // bisa email atau username
    $password = $this->request->getPost('password');

    // Cari user berdasarkan email atau username
    $user = $this->userModel
        ->groupStart()
            ->where('email', $login)
            ->orWhere('username', $login)
        ->groupEnd()
        ->first();

    if ($user && password_verify($password, $user['password'])) {
        // Set session
        $session->set([
            'isLoggedIn' => true,
            'user_id'    => $user['id'],
            'email'      => $user['email'],
            'username'   => $user['username'],
        ]);

        // Redirect ke halaman sebelumnya kalau ada, atau fallback ke /info
        $redirectTo = $session->get('redirect_url') ?? '/info';
        $session->remove('redirect_url');

        return redirect()->to($redirectTo);
    }

    return redirect()->back()->withInput()->with('error', 'Email atau password salah');
}

    public function register()
    {
        return view('auth/register');
    }

    public function attemptRegister()
    {
        $data = [
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
            'fullname' => $this->request->getPost('fullname'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ];
        $this->userModel->save($data);

        return redirect()->to('/login')->with('success', 'Registrasi berhasil, silakan login.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}