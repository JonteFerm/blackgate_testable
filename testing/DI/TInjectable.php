<?php

namespace Anax\DI;

trait TInjectable
{
    protected $di; // the service container

    public function setDI($di)
    {
        $this->di = $di;
    }

    public function __get($service)
    {
        /*$this->$service = $this->di->get($service);
        return $this->$service;*/

        return new \Testing\CDatabaseBasic();

    }

    public function __call($service, $arguments = [])
    {
        return new \Testing\CDatabaseBasic();
        /*$this->$service = $this->di->get($service);
        return $this->$service;*/

        
    }
}
