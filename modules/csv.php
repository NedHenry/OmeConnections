<?php

Class CSV_module extends OmeConnections_Abstract_Module
{
  protected $supports_push = true;
  protected $supports_pull = true;

  public function connect()
  {
    //open filestream
  }
  public function disconnect()
  {
    //close filestream
  }
  public function push($records)
  {
    //loop through records
    //write each record to file
    return "this is the push function in the CSV module";
  }

  public function pull($path)
  {
    //open file from path
    //loop through lines
    //add or update collections
    return "this is the push function in the CSV module";
  }

}

?>