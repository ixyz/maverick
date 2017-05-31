<?php namespace App\Controller\Page;

use App\Model\Comment;
use App\Model\Relation;
use Ixyz\Landbaron\App\Controller;
use Ixyz\Landbaron\WP\Query;

class PostController extends Controller
{
    public function single()
    {
        // Post
        $post = $this->getPost();

        // Relations
        $relations = Relation::get($post, 5);

        // Navigation
        $nav = Query::instance([
            'post_type' => 'page'
        ])->posts();

        return $this->response()->view('pages.post', [
            'post' => $post,
            'relations' => $relations,
            'nav' => $nav,
        ]);
    }

    public function page()
    {
        // Post
        $post = $this->getPost();

        // Navigation
        $nav = Query::instance([
            'post_type' => 'page'
        ])->posts();

        return $this->response()->view('pages.post', [
            'post' => $post,
            'nav' => $nav
        ]);
    }
}
