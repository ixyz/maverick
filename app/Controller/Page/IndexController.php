<?php namespace App\Controller\Page;

use App\Model\Nav;
use App\Model\Pagination;
use Ixyz\Maverick\Core\Controller;
use Ixyz\Maverick\WP\Query;

class IndexController extends Controller
{
    public function index()
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
