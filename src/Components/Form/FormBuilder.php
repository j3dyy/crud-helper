<?php

namespace J3dyy\CrudHelper\Components\Form;

use J3dyy\CrudHelper\Elements\Element;
use J3dyy\CrudHelper\Tools\Collectable;

class FormBuilder
{
    protected $grid;
    protected $form;

    public function __construct(string $action = '', string $method = 'GET',$classes = null, string $id = null){
        $this->grid = new Collectable();
        $this->form = new Form($action, $method,$classes,$id);
    }

    public function add(string $position, Element $element){
        $this->grid->get($position) != null ?: $this->grid->put($position, new Collectable());

        $this->grid->get($position)->push($element);
    }


    private function reduce(string $position, callable $then){
        $this->grid->get($position) == null ?: $then();
    }


    private function castToInput(){
        $casted = null;

        return $casted;
    }


}
