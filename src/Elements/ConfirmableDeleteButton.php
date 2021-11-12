<?php

namespace J3dyy\CrudHelper\Elements;

class ConfirmableDeleteButton extends Button
{

    public function __construct($key, $route = null)
    {
        $content = '<span class="glyphicon glyphicon-trash"></span>';
        $classes = 'btn btn-danger delete-entity';
        $dataAttrs = [
            'route'=> $route,
            'remove-selector'=> 'tr[data-id={id}]',
            'content-text'=> __('base.deleteconf'),
            'title-text' => __('base.delete')
        ];
        parent::__construct($key, $content, $classes, null, $dataAttrs, null);
    }
}
