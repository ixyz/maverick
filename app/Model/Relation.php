<?php namespace App\Model;

use Ixyz\Maverick\WP\Query;

class Relation
{
    /**
     * @param WP_Term[] $categories
     * @param int $limit
     * @return Post[]
     */
    public static function get($post, $page)
    {
        $posts = [];

        $query = Query::instance([
            'post_type' => 'post',
            'posts_per_page' => $page,
            'post__not_in' => [ $post->wp()->ID ],
            'orderby' => 'rand',
            'meta_key' => 'writerplus_gottsuan_fixed'
        ]);
        $posts = array_merge($posts, $query->posts());

        return $posts;
    }
}
