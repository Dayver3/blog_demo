<?php

namespace Application\core;

final class View
{
    public $data = [];

    public function set($key, $value)
    {
        $this->data[$key] = $value;
    }

    public function render($template)
    {
        $file = DIR_VIEW . $template . '.tpl';

        if (file_exists($file)) {
            extract($this->data, EXTR_OVERWRITE);
            ob_start();
            require($file);
            return ob_get_clean();
        }
        return null;
    }
}