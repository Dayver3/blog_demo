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
        $response_str = '';
        $data = $this->app->get('request')->post + $this->app->get('request')->get;
//        var_dump($this->app->get('request')->post);
//        var_dump($this->app->get('request')->get);
        $data['now_date'] = (string)date("Y-m-d H:i:s");
        if (isset($data['comment'])) {
            $this->app->model('comment')->addComment($data);
        }

//          var_dump($data);
        $json = json_encode($data);
        echo $json;


//        $this->app->get('response')->redirect($this->app->get('url')->link('home'));

    }

    public function getCommentsAction()
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
        $data['answers'] = true;
        $arr = [];
        $arr['comments'] = $this->commentSort($data['comments']);
//        $view = $this->commentRender($arr);
        $view = $this->app->view('content/comment', $arr);
        echo $view;
//        return $view;
    }

    private function commentRender($comments, $i = 0)
    {
        $answers = [];
        foreach ($comments as $comment) {
            if ($comment['answers']) {
                $this->commentRender($comment['answers']);
                $answers[] = $this->app->view('content/comment', $comment);
            } else {
                    array_push($answers, $comment);
                }
            }

        return $answers;


//        $view = '';
//        foreach ($comments as $comment) {
//            if ($comment['answers']) {
//                $view = $this->commentRender($comment['answers'], ++$i);
//            } else {
////                $comment['margin-left'] = $i * 10;
//                $view .= $this->app->view('content/comment', $comment);
//            }
//        }
//        return $view;
    }

    private function commentSort($comments, $child_parent_id = 0)
    {
        $answers = [];
        foreach ($comments as $comment1) {
            if ($comment1['parent_id'] == $child_parent_id) {

                if ($comment1['answers'] = $this->commentSort($comments, $comment1['id'])) {
                    $answers[] = $comment1;
                } else {
                    array_push($answers, $comment1);
                }

            }
        }

        return $answers;
    }

    private function recursiveAction($comments, $post_id = 1, $iteration = 0)
    {


        $parent = [];
//        foreach ($comments as $comment){
////            if ($comment['id'] == $parent_id  and $inc <= 3){
////                $comment['parent'] = $inc;
////                $comment['answers'] = $this->recursiveAction($comments, $comment['parent_id'], ++$inc);
////                array_push($parent, $comment);
////            }
//
//            if ($comment['parent_id'] == $post_id && $iteration < 4) {
//                $comment['answers'] = $this->recursiveAction($comments, $comment['id'], ++$iteration);
//                array_push($parent, $comment);
//            }
//        }
//        return $parent;

//        $view_arr = [];
//        $nesting = 0;
////        $nesting_max = $i;
//        foreach ($data as $datum) {
////          $view_arr[] = $datum;
//
//        }
//        return $view_arr;

//        $arr = [];
//        $answers = [];
//        $nesting = $i;
//        foreach ($data as $datum) {
//            if ($datum['parent_id'] && $nesting < 3) {
//               $nesting++;
//               $answers[] = $datum;
//               array_push($arr['answers'], $this->recursiveAction($answers, $nesting));
//               $l = 0;
//            }
//        }
//        $data['view'] = $answers;
//        return $data;
    }
}