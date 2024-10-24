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
        $ip        = md5($request->getIPAddress());
        $capacity  = 60;
        $seconds   = MINUTE;

        // Restrict an IP address to no more than 1 request per second across the entire site.
        // Technically we are allowing a maximum of 60 requests per minute,
        // which would equal 1 request per second.
        // ===================================================================================
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
