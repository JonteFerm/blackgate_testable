<?php

namespace Jofe\Blackgate;

class CDatabaseBasic
{
    private $query = null;
    private $params = array();
    private $testRes = array();


    public function __construct()
    {
        
    }


    public function executeFetchAll(
        $query = null,
        $params = [],
        $debug = false
    ) {

       
        
        return $this->testRes;
    }

    public function execute($query = null,$params = []) {

        $this->query = $query;
        $this->params = $params;

    }

    public function getQuery(){
        return $this->query;
    }

    public function getParams(){
        return $this->params;
    }

    public function setTestRes($testRes){
        $this->testRes = $testRes;
    }

}
