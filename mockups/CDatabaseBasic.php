<?php
namespace Mockups;

class CDatabaseBasic
{

    public function executeFetchAll(
        $query = null,
        $params = [],
        $debug = false
    ){
        $mockRes = new \Mockups\CMockResult();
        $testRes = array($mockRes);
        
        
        return $testRes;
    }

    public function execute($query = null,$params = []) {

    }




}
