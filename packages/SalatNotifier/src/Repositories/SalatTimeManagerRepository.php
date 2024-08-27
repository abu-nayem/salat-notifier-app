<?php

namespace  SalatNotifier\Repositories;

use SalatNotifier\Models\SalatTime;
use SalatNotifier\Interfaces\SalatTimeManagerInterface;

class SalatTimeManagerRepository implements SalatTimeManagerInterface
{
    public function all()
    {
        return SalatTime::all();
    }
    public function store(array $payloads)
    {
        SalatTime::create($payloads);
    }
    public function findById($id)
    {
        return SalatTime::where('id', $id)->first();
    }
    public function update($id, array $payloads)
    {
        $model = $this->findById($id);
       return $model->update($payloads);
    }
    public function delete($id)
    {
        $model = $this->findById($id);
        if($model){
            $model->delete();
            return true;
        } 
        return false;

    }

}
