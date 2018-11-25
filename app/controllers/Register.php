<?php

class Register extends Controller
{
    public function __construct($controller, $action)
    {
        $this->load_model('Users');
        parent::__construct($controller, $action);
    }

    public function loginAction()
    {
        $validation = new Validate();
        if ($_POST) {
            // form validation
            $validation->check($_POST, [
                'username' => [
                    'display' => "Username",
                    'required' => true
                ],
                'password' => [
                    'display' => 'Password',
                    'required' => true,
                    'min' => 6
                ]
            ]);
            if ($validation->passed()) {
                $user = $this->UsersModel->findByUsername($_POST['username']);
                if ($user && password_verify(Input::get('password'), $user->password)) {
                    $remember = (isset($_POST['remember_me']) && Input::get('remember_me')) ? true : false;
                    $user->login($remember);
                    Router::redirect('');
                }
                else{
                    $validation->addError("There is no combination of this username and password in our system, please try again.");
                }
            }
        }
        $this->view->displayErrors = $validation->displayErrors();
        $this->view->render('register/login');
    }

    public function logoutAction()
    {
        if (currentUser()) {
            currentUser()->logout();
        }

        Router::redirect('register/login');
    }

    public function registerAction(){
        $validation = new Validate();
        $postedValues = ['fname' => '', 'lname' => '', 'email' => '', 'username' => '', 'password' => '', 'confirm' => ''];
        if ($_POST) {
            $postedValues = postedValues($_POST);
            $validation->check($_POST, [
                'fname' => [
                    'display' => 'First Name',
                    'required' => true
                ],
                'lname' => [
                    'display' => 'Last Name',
                    'required' => true
                ],
                'email' => [
                    'display' => 'Email',
                    'required' => true,
                    'max' => 150,
                    'unique' => 'users',
                    'valid_email' => true
                ],
                'username' => [
                    'display' => 'Username',
                    'required' => true,
                    'unique' => 'users',
                    'min' => 6,
                    'max' => 150
                ],
                'password' => [
                    'display' => 'Password',
                    'required' => true,
                    'min' => 10,
                    'max' => 150
                ],
                'confirm' => [
                    'display' => 'Confirm Password',
                    'required' => true,
                    'matches' => 'password'
                ]
            ]);

            if ($validation->passed()) {
                $newUser = new Users();
                $newUser->registerNewUser($_POST);
                Router::redirect('register/login');
            }
        }
        $this->view->post = $postedValues;
        $this->view->displayErrors = $validation->displayErrors();
        $this->view->render('register/register');
    }
}
