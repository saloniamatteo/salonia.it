<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class Throttler implements FilterInterface {
    /**
     * Throttler/Rate limiter
     *
     * @param list<string>|null $arguments
     * @return ResponseInterface|void
     */
    public function before(RequestInterface $request, $arguments = null) {
        $throttler = service('throttler');

        // Restrict an IP address to no more than 5 HTTP requests
        // every 3 seconds across the entire site.
        $ip        = md5($request->getIPAddress());
        $capacity  = 20;
        $seconds   = 3;

        // check(key, capacity, seconds, cost)
		// key (string):   The name of the bucket
        // capacity (int): The number of tokens the bucket holds
        // seconds (int):  The number of seconds it takes for a bucket to completely fill
        // cost (int):     The number of tokens that are spent on this action
        if ($throttler->check(md5($ip), $capacity, $seconds) === false) {
            throw new \Exception("Too Many Requests", 429);
        }
    }

    /**
     * We don't have anything to do here.
     *
     * @param list<string>|null $arguments
     * @return void
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) {
        // ...
    }
}
