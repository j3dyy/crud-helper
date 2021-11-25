<?php
namespace J3dyy\CrudHelper\View\Traits;

use Doctrine\DBAL\Types\BooleanType;
use Doctrine\DBAL\Types\StringType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use J3dyy\CrudHelper\Components\Form\Form;
use J3dyy\CrudHelper\Components\Form\Input;
use J3dyy\CrudHelper\Components\Table\Column;
use J3dyy\CrudHelper\Elements\ElementTypes;
use J3dyy\LaravelLocalized\DB\Localized;
use PhpParser\Node\Expr\AssignOp\Mod;

trait ColumnHelper
{

    public static function parseAndCreateColumns(Model $model): array{
        $columns = [];

        $dbColumns = self::getDbColumns($model->getTable());
        foreach ($dbColumns as $dbColumn){
            //here we need detect other types
            $columns[] = Column::raw($dbColumn,$dbColumn);
        }
        return $columns;
    }

    public static function parseAndCreateFormFields(Model $model, Form $form): Form
    {
        //todo if fillable not initialized then we need to fetch fields from database
        // $dbColumns = self::getDbColumns($model->getTable());
        if (count($model->getFillable()) <= 0){
            throw new \Exception("fillable not setted ");
        }

        $translation = get_class($model).config('localized.translated_endpoint','Translation');
        $translation = new $translation();


        $fields = array_filter($model->getFillable(), function ($e) use ( $model ){
            return is_int(array_search($e,$model->getHidden())) == false;
        });

        $translatedFields = array_filter($translation->getFillable(), function ($e) use ( $translation ){
            return is_int(array_search($e,$translation->getHidden())) == false;
        });

        //auto j3dyy/laravel-localized support
        if ($model instanceof Localized){

            foreach ($fields as $field){
                $dbField = $model->getConnection()->getDoctrineColumn($model->getTable(),$field);

                if ($dbField->getType() instanceof BooleanType){
                    $form->addElement(
                        new Input(ElementTypes::BOOLEAN,$field,__('laravel-crud.'.$field))
                    );
                }
                //other types
                // todo field mapper
            }

            foreach ($translatedFields as $translatedField){
                $dbField = $translation->getConnection()->getDoctrineColumn($translation->getTable(),$translatedField);
                if ($dbField->getType() instanceof StringType){
                    $form->addElement(
                        new Input(ElementTypes::TEXT,$field,__('laravel-crud.'.$field))
                    );
                }
                //other types
                // todo field mapper
            }
        }else{
            //todo
        }

        dd($form);
        return $form;
    }

    private static function getColumnType(){

    }

    private static function getDbColumns(string $table){
        return Schema::getColumnListing($table);
    }

}
