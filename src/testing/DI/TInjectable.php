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

        return new \Jofe\Testing\CDatabaseBasic();

    }

    public function __call($service, $arguments = [])
    {
        /*$this->$service = $this->di->get($service);
        return $this->$service;*/

        
    }
}
