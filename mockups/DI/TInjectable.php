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

        return new \Mockups\CDatabaseBasic();

    }

    public function __call($service, $arguments = [])
    {
        return new \Mockups\CDatabaseBasic();
        
    }
}
