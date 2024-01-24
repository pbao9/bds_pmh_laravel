<?php

namespace App\Admin\Collections\Admin;

class AdminCollection 
{
    private $collection;

    public function selectSearch($collection){
        if(!$collection){
            return null;
        }
        $this->collection = $collection->map(function($item) {
            $item->text = $item->fullname.' - '.$item->phone;
            return $item->only('id', 'text');
        });

        $this->collection = [
            'results' => $this->collection
        ];

        return $this->collection;
    }
}