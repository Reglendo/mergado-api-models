<?php

namespace Reglendo\MergadoApiModels;


use Illuminate\Support\Collection;

class ModelCollection extends Collection
{

    public function setNewToken($token)
    {
        $this->transform(function($item) use ($token) {
            if(method_exists ( $item, "setNewToken" )) {
                $item->setNewToken($token);
            }
            return $item;
        });

        return $this;
    }

    public function setExists($exists = true)
    {
        $this->transform(function($item) use ($exists) {
            if(method_exists ( $item, "setNewToken" )) {
                $item->exists = $exists;
            }
            return $item;
        });

        return $this;
    }


}