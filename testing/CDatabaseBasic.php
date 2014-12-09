<?php
namespace Testing;

class CDatabaseBasic
{

    public function __construct()
    {
        
    }


    public function executeFetchAll(
        $query = null,
        $params = [],
        $debug = false
    ){
        $mockRes = new \Testing\CMockResult();
        $testRes = array($mockRes);
        
        $this->params = $params;
        
        return $testRes;
    }

    public function execute($query = null,$params = []) {

        $this->query = $query;
        $this->params = $params;

    }




}
