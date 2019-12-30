<?php


namespace Application\controller\content;


use Application\core\Controller;
use Application\engine\Route;

class TopicController extends Controller
{
    private $error;

    public function indexAction()
    {
//        $this->getListAction();

        $data['header'] = $this->app->execute(new Route('header'));
        $data['footer'] = $this->app->execute(new Route('footer'));

        $this->app->get('response')->setOutput($this->app->view('topic/form', $data));

    }

    public function addTopicAction ()
    {
        $data = $this->app->get('request')->post;
        $data ['user_id'] = $this->app->get('user')->getId();
        $data['username'] = $this->app->get('user')->getUsername();

        $this->app->model('topic')->addTopic($data);


        $this->app->get('response')->redirect($this->app->get('url')->link('home'));
    }

    public function getListAction()
    {
        $data['logged'] = $this->app->get('user')->isLogged();

        if ($this->error) {
            $data['error'] = $this->error;
        } else {
            $data['error'] = '';
        }

        $data['add'] = $this->get('url')->link('topic/add');
        $data['view'] = $this->get('url')->link('topic/view');

        $data['topics'] = $this->app->model('topic')->getTopics();

        // Layout
        $data['header'] = $this->app->controller('layout/header');
        $data['footer'] = $this->app->controller('layout/footer');
        // END Layout

        return $this->app->view('topic/list', $data);
    }

    public function viewAction()
    {
        $data = $this->app->model('topic')->getTopic($this->request->get['id']);
        $data['topic_id'] = $this->request->get['id'];
        $data['user_id'] = $this->_user_->getId();
        $data['author'] = $this->_user_->getUsername();

        if ($this->request->isPost()) {
            $comment = $data + $this->request->post;

            $this->app->model('topic')->addComment($comment);;
        }

        $data['comments'] = $this->app->model('topic')->getComments($data['topic_id']);

        $data['logged'] = $this->_user_->isLogged();

        $data['action'] = $this->url->link('topic/view') . '?id=' . $this->request->get['id'];

        if ($this->error) {
            $data['error'] = $this->error;
        } else {
            $data['error'] = '';
        }

        // Layout
        $data['header'] = $this->app->controller('layout/header');
        $data['footer'] = $this->app->controller('layout/footer');
        // END Layout

        $this->response->setOutput( $this->app->view('topic/view', $data));
    }

    public function addCommentAction ()
    {
        var_dump($this->app->get('request')->get);
        $data = $this->app->get('request')->post + $this->app->get('request')->get;
//        var_dump($this->app->get('request')->post);
//        var_dump($_POST);
//        var_dump($_GET);
//        var_dump($this->app->get('request')->get);

        $this->app->model('comment')->addComment();


        $this->app->get('response')->redirect($this->app->get('url')->link('home'));
    }

}