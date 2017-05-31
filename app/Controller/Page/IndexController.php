<?php namespace App\Controller\Page;

use App\Model\Nav;
use App\Model\Pagination;
use Ixyz\Landbaron\App\Controller;
use Ixyz\Landbaron\WP\Query;

class IndexController extends Controller
{
    public function index($a, $b)
    {
        $paged = get_query_var('paged');

        $query = Query::instance([
            'post_type' => 'post',
            'posts_per_page' => 10,
            'paged' => $paged
        ]);
        $posts = $query->posts();
        $pagination = Pagination::links($paged, $query->wp()->max_num_pages);
        $nav = Query::instance([
            'post_type' => 'page'
        ])->posts();

        return $this->response()->view('pages.index', [
            'posts' => $posts,
            'pagination' => $pagination,
            'nav' => $nav
        ]);
    }
}
