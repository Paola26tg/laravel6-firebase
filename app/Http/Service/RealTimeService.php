<?php
namespace  App\Http\Service;

use  Kreait\Firebase\Database;

class  RealTimeService{
    protected $db;
    public  function  __construct(Database $database)
    {
        $this->database = $database;
    }
}
