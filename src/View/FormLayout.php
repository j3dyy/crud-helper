<?php

namespace J3dyy\CrudHelper\View;

use App\Models\Teams;
use Illuminate\Contracts\View\View;
use J3dyy\CrudHelper\Components\Form\Form;
use J3dyy\CrudHelper\Components\Form\FormBuilder;
use J3dyy\CrudHelper\Components\Form\Input;
use J3dyy\CrudHelper\Components\Table\Table;
use J3dyy\CrudHelper\Elements\ElementTypes;
use J3dyy\CrudHelper\Tools\ModelTools;
use J3dyy\CrudHelper\View\Model\Model;
use  \Illuminate\Database\Eloquent\Model as EloquentModel;
use J3dyy\CrudHelper\View\Model\ViewModel;
use J3dyy\LaravelLocalized\DB\Localized;
use J3dyy\LaravelLocalized\Tools\TranslationTool;
use JetBrains\PhpStorm\Pure;

class FormLayout extends Layout
{


    #[Pure]
    public function __construct(Model $viewModel)
    {
        parent::__construct($viewModel);
    }

    public static function of( EloquentModel $model = null, string $classes = null, string $id = null ){
        $relatedModels = [$model];

//        $form = new Form('','',$classes,$id);

        //fetch fields from model or db
        //out of the box laravel-localized package support
        if ($model instanceof Localized){
            $relatedModels[] =  TranslationTool::createTranslation($model);
        }else{
            dd("not handled");
        }
//        $form = self::parseAndCreateFormFields($model,$form);

        //fetch all field for form
        $fields = ModelTools::getFields($model,...$relatedModels);

        $formBuilder = new FormBuilder('','',$classes,$id);



        //iterate over models
        $fields->each(function ($field, $modelName) use ($formBuilder) {
            //iterate over fields
            $field->each(function ($item, $key) use ($modelName,$formBuilder){
                $formBuilder->add( $modelName, Input::formLayout($item) );
            });
        });

        dd($formBuilder);
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
