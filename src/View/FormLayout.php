<?php

namespace J3dyy\CrudHelper\View;

use Illuminate\Contracts\View\View;
use J3dyy\CrudHelper\Components\Form\Form;
use J3dyy\CrudHelper\Components\Table\Table;
use J3dyy\CrudHelper\View\Model\Model;
use  \Illuminate\Database\Eloquent\Model as EloquentModel;
use J3dyy\CrudHelper\View\Model\ViewModel;
use JetBrains\PhpStorm\Pure;

class FormLayout extends Layout
{


    #[Pure]
    public function __construct(Model $viewModel)
    {
        parent::__construct($viewModel);
    }

    public static function of( EloquentModel $model = null, string $classes = null, string $id = null ){
        $form = new Form('','',$classes,$id);

        $formFields = self::parseAndCreateFormFields($model,$form);

        return new FormLayout(
            new ViewModel($form)
        );
    }




    public function render(): View
    {
        return view('crudHelper::themes.form',[
            'viewModel' => $this->viewModel
        ]);
    }
}
