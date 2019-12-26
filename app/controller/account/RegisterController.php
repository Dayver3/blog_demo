<?php

namespace Application\controller\account;

use Application\core\Controller;
use Application\engine\Route;

class RegisterController extends Controller
{
    public function indexAction()
    {
        $err = '';
        $data = [];
        $data['err'] = $err;
        //Layout
        $data['header'] = $this->app->execute(new Route('header'));
        $data['footer'] = $this->app->execute(new Route('footer'));

        $this->app->get('response')->setOutput($this->app->view('account/register', $data));
    }

    public function validate()
    {
        $err = '';

        if (strlen(trim($this->app->get('request')->post['username'])) < 1 || strlen(trim($this->app->get('request')->post['username'])) > 255) {
            $err = 'Error: Username must be between 1 and 255 characters!';
        } elseif (strlen($this->app->get('request')->post['email']) > 96) {
            $err = 'Error: Email must be less than 96 characters!';
        } elseif ($this->app->model('users')->allowUserByEmail($this->app->get('request')->post['email'])) {
            $err = 'Error: E-Mail Address is already registered!';
        } elseif ((strlen($this->app->get('request')->post['password']) < 4) || strlen($this->app->get('request')->post['passwordVerify']) > 40) {
            $err = 'Error: Password must be between 4 and 20 characters!';
        } elseif ($this->app->get('request')->post['password'] !== $this->app->get('request')->post['passwordVerify']) {
            $err = 'Error: Your password do not matches!';
        }

        return $err;
    }

    public function applyAction()
    {
        $err = $this->validate();
        if ($this->app->get('request')->isPost() && !$err) {
            $this->app->model('users')->addUser($this->app->get('request')->post);
            $this->app->get('response')->redirect($this->app->get('url')->link('home'));
        } else {
            $this->app->get('response')->redirect($this->app->get('url')->link('register'));
            echo $err;
        }

    }
}