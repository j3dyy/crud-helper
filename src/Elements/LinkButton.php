<?php

namespace J3dyy\CrudHelper\Elements;

class LinkButton extends Button
{

    public function __construct($key, $route = null, $icon = 'glyphicon glyphicon-th-large', $classes = 'btn btn-default')
    {
        $content = '<span class="'.$icon.'"></span>';

        parent::__construct($key, $content, $classes, null, [], $route);
    }
}
