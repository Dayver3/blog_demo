<?php

namespace Application\engine;

//namespace Application\Mvc\core;

class Response
{
    private $headers = [];
    private $output;

    public function addHeader($header)
    {
        $this->headers[] = $header;
    }

    public function setOutput($output)
    {
        $this->output = $output;
    }

    public function send()
    {

        if ($this->output) {

            if (!headers_sent()) {
                foreach ($this->headers as $header) {
                    header($header, true);
                }
            }

            echo $this->output;
        }

    }

    public function redirect($url, $status = 302)
    {
        header('Location: ' . str_replace('&amp;', '&', $url), true, $status);
        exit();
    }
}