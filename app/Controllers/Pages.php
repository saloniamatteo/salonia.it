<?php

namespace App\Controllers;
use CodeIgniter\Exceptions\PageNotFoundException;

class Pages extends BaseController {
    private $data;
    protected $request;

    private function setup($lang = '') {
        $this->request = service('request');

        // Load helpers
        helper("cookie");
        helper("html");
        helper("url");  // app\Helpers\url_helper.php

        // If a locale-override is provided, set the page locale to it.
        // Only "index" sets "lang", because of a CodeIgniter quirk.
        // See app\Config\Routes.php for said "hack".
        if (!empty($lang)) {
            $this->request->setLocale($lang);
            $locale = $lang;
        } else {
            $locale = $this->request->getLocale();
        }

        // Save locale to data array
        $this->data["locale"] = $locale;
    }

    // Index
    public function index($lang = '') {
        $this->setup($lang);

        // Render page
        return view("index", $this->data);
    }

    // Generic error
    public function error() {
        $this->setup();

        // Render generic error page
        return view("errors/html/production", $this->data);
    }

    // View page
    public function view($page = 'index') {
        $this->setup();

        // If requested page ends with "htm(l)", trim it.
        if (str_ends_with(strtolower($page), ".htm"))
            $page = rtrim($page, ".htm");
        else if (str_ends_with(strtolower($page), ".html"))
            $page = rtrim($page, ".html");

        // Check if view exists
        if (!file_exists(APPPATH . "Views/" . esc($page) . ".php"))
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

        // Render custom page
        return view(esc($page), $this->data);
    }
}
