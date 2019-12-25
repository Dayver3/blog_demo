<?php


namespace Application\controller\content;


use Application\core\Controller;

class CommentController extends Controller
{

    public function addCommentAction()
    {
        $data = $this->app->get('request')->post + $this->app->get('request')->get;
        var_dump($this->app->get('request')->post);
        var_dump($this->app->get('request')->get);
        var_dump($data);

        $this->app->model('comment')->addComment($data);

        $this->app->get('response')->redirect($this->app->get('url')->link('home'));

    }
}