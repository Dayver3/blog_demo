<?php

namespace Application\controller\account;

use Application\core\Controller;
use Application\engine\Route;

class LoginController extends Controller
{
    private $error = '';
    public function indexAction()
    {
        $data = [];
        $data['error'] = $this->error;
        $data['url'] = $this->app->get('url');

        $data['header'] = $this->app->execute(new Route('header'));
        $data['footer'] = $this->app->execute(new Route('footer'));



        $this->app->get('response')->setOutput($this->app->view('account/login', $data));
    }

    public function applyAction()
    {

        if ($this->app->get('request')->isPost() && $this->validate()) {
            $this->app->get('response')->redirect($this->app->get('url')->link('home'));
        }

        if ($this->app->get('request')->isPost()) {
            $data = $this->app->get('request')->post;
        }

        $data['error'] = $this->error;


        $this->app->get('response')->setOutput($this->app->view('account/login', $data));
    }

    public function validate()
    {
        if (strlen($this->app->get('request')->post['password']) < 4 || strlen($this->request->post['password']) > 20) {
            $this->error = 'Error: Password must be between 4 and 20 characters!';
        }

        elseif (strlen($this->app->get('request')->post['email']) > 96) {
            $this->error = 'Error: E-Mail Address does not appear to be valid!';
        }

        elseif (!$this->app->get('user')->login($this->app->get('request')->post)) {
            $this->error = 'Error: No match for Email and/or Password.';
        }

        else {
            return true;
        }

        return false;
    }
}