<?php
namespace J3dyy\CrudHelper\Tools;


use Illuminate\Database\Eloquent\Model;

class ModelTools
{

    /**
     * @param Model ...$model
     * @return Collectable
     */
    public static function getFields(Model ...$model){
        $fields = new Collectable();
        foreach ($model as $m){
            $fieldMeta = new Collectable();
            foreach ($m->getFillable() as $fillable){
                $field = $m->getConnection()->getDoctrineColumn($m->getTable(),$fillable);
                $fieldMeta->put($fillable, [
                    'type'      =>  $field->getType()->getName(),
                    'length'    =>  $field->getLength(),
                    'nullable'  =>  $field->getNotnull(),
                    'default'   =>  $field->getDefault(),
                    'name'      =>  $field->getName()
                ]);
            }
            $fields->put($m->getTable(),$fieldMeta);
        }
        return $fields;
    }

    public static function castToElementType(string $type){
        dd($type);
    }
}
