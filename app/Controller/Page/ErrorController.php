<?php namespace App\Controller\Page;

use Ixyz\Landbaron\App\Controller;

class ErrorController extends Controller
{
    public function _404()
    {
        return $this->view('errors.404');
    }
}
