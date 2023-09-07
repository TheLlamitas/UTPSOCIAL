<?php

namespace App\Traits;

trait Database
{
    public function persist($class, $data)
    {
        $model = (isset($data['id'])) ? $class::find($data['id']) : new $class;
        $model->fill($data);
        $model->save();
        return $model;
    }
}