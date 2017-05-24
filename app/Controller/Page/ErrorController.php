<?php namespace App\Controller\Page;

use Ixyz\Maverick\Core\Controller;

class ErrorController extends Controller
{
    public function _404()
    {
        return $this->view('errors.404');
    }
}
