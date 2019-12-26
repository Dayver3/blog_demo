<?php


namespace Application\controller\content;


use Application\core\Controller;

class CommentController extends Controller
{
    public function indexAction()
    {
        $data['logged'] = false;
        $data['username'] = 'username';

        $data['title'] = 'customTitle';
        $data['base'] = '';
        $data['links'] = '';
        $data['styles'] = '';
        $data['scripts'] = '';
        $data['topics'] = $this->app->model('topic')->getTopics();

        return $this->app->view('content/comment', $data);
    }

    public function addCommentAction()
    {
        $response_str= '';
        $data = $this->app->get('request')->post + $this->app->get('request')->get;
//        var_dump($this->app->get('request')->post);
//        var_dump($this->app->get('request')->get);
        $data['now_date'] = (string)date("Y-m-d H:i:s");
        echo json_encode($data);

        $this->app->model('comment')->addComment($data);

//        $this->app->get('response')->redirect($this->app->get('url')->link('home'));

    }
}