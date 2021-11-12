<?php

namespace J3dyy\CrudHelper\Elements;

class EditButton extends Button
{

    public function __construct($key, $route = null, $bindForm = '')
    {
        $content = '<span class="glyphicon glyphicon-pencil"></span>';
        $classes = 'btn btn-primary modal-edit-form';
        $dataAttrs = [
            'route'=> $route,
            'bind-form' => $bindForm
        ];

        parent::__construct($key, $content, $classes, null, $dataAttrs, null);
    }
}
