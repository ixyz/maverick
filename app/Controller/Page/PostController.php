<?php namespace App\Controller\Page;

use App\Model\Comment;
use App\Model\Relation;
use Ixyz\Maverick\Core\Controller;
use Ixyz\Maverick\WP\Query;

class PostController extends Controller
{
    public function single()
    {
        // Post
        $post = Query::instance([
            'p' => $this->getID()
        ])->firstPost();

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
        // Query
        $query = Query::instance([
            'page_id' => $this->getID()
        ]);

        // Post
        $post = $query->firstPost();

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
