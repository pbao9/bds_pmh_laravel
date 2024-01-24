<?php

namespace App\Admin\Collections\Address;

class DistrictCollection 
{
    private $collection;

    public function selectSearch($collection){
        if(!$collection){
            return null;
        }
        $this->collection = $collection->map(function($item) {
            $item->text = $item->name;
            $item->id = $item->code;
            return $item->only('id', 'text');
        });

        $this->collection = [
            'results' => $this->collection
        ];

        return $this->collection;
    }
}