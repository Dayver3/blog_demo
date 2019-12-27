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
        if (isset($data['comment'])) {
            $this->app->model('comment')->addComment($data);
        }

//          var_dump($data);
        echo json_encode($data);



//        $this->app->get('response')->redirect($this->app->get('url')->link('home'));

    }

    public function getCommentsAction ()
    {
        $post_id = $this->app->get('request')->get['post_id'];
        $comments = $this->app->model('comment')->getCommentByPostId($post_id);
        $data['comments'] = $comments;
//        $data['children'];
        $a = 0;
        $children = [];
//        foreach ($comments as $comment) {
//            if ($comment['parent_id'] && $comment <= 3){
//                $a++;
//                $children[] = $this->getCommentsAction();
//            }
//        }
       $arr = $this->recursiveAction($data['comments']);
        $view = $this->app->view('content/comment', $data);
        echo $view;
        return $view;
    }

    private function recursiveAction ($data)
    {
        $answers = [];
        $a = 0;
        foreach ($data as $datum) {
            if ($datum['parent_id'] && $a < 3) {
               $a++;
               $answers[] = $datum;
               $arr[] = $this->recursiveAction($answers);
               $l = 0;
            }
        }
        $data['view'] = $answers;
        return $data;
    }
}