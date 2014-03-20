<?php

Abstract Class OmeConnections_Abstract_Module
{
  public $supports_push = false;
  public $supports_pull = false;
  abstract public function connect();
  abstract public function disconnect();

  public static function getAllModules()
  {
    //scan modules folder
    //return array of different types of AbstractModule
    //initialize each instance with data from DB
  }

  public function push($records)
  {
    echo "remote push not supported on this module";
    return(-1);
  }

  public function pull($selectors)
  {
    echo "remote push not supported on this module";
    return(-1);
  }

  public function getCredentialForm()
  {
    return("default OmeConnect module credential form");
  }

  public function processCredentialForm()
  {
    echo("processing credential form");
  }

  public function getRemoteSelectorForm()
  {
    return("default OmeConnect module credential form");
  }

  public function processRemoteSelectorForm()
  {
    echo("processing remote selector form");
  }

}

?>
