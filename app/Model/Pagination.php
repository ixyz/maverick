<?php namespace App\Model;

class Pagination
{
    public $prev = null;
    public $pages = [];
    public $next = null;
    public $paged = null;
    public $hasPrev = false;
    public $hasNext = false;

    public static function links($paged, $pages, $range = 1)
    {
        return new static($paged, $pages, $range);
    }

    public function __construct($paged, $pages, $range)
    {
        if (empty($paged)) {
            $paged = 1;
        } else {
            $paged = (int)$paged;
        }
        $pages = (int)$pages;

        if ($paged > 1) {
            $this->prev = $paged - 1;
            $this->hasPrev = true;
        }

        for ($i = $range; $i > 0; --$i) {
            if ($paged - $i < 1) {
                continue;
            }
            $this->pages[] = $paged - $i;
        }
        $this->pages[] = $paged;
        for ($i = 1; $i <= $range; ++$i) {
            if ($paged + $i > $pages) {
                break;
            }
            $this->pages[] = $paged + $i;
        }

        if ($paged < $pages) {
            $this->next = $paged + 1;
            $this->hasNext = true;
        }

        $this->paged = $paged;
    }
}
