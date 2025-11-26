<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {

        if (! session()->get('logged_in')) {
            return redirect()->to('/login');
        }


        $uri = service('uri');


        if ($uri->getSegment(1) == 'admin') {

            if (session()->get('user_role') != 'admin') {
                return redirect()->to('/news');
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do nothing here
    }
}
