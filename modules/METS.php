<?php

Class METS_module extends OmeConnections_Abstract_Module
{ 

  //HEADER DATA
  $createDate=now();
  $recordstatus = "";
  $agents[] = array("Ned Henry","CREATOR","INDIVIDUAL","my notes");
  $agents[] = array("Exampladora McFakename","ARCHIVIST","INDIVIDUAL","my notes");
  
  /*
<metsHdr CREATEDATE="2003-07-04T15:00:00" RECORDSTATUS="Complete">
	<agent ROLE="CREATOR" TYPE="INDIVIDUAL">
	  <name>Jerome McDonough</name>
	</agent>
	<agent ROLE="ARCHIVIST" TYPE="INDIVIDUAL">
	  <name>Ann Butler</name>
	</agent>
      </metsHdr>

Allowable values for ROLE include "ARCHIVIST," "CREATOR," "CUSTODIAN," "DISSEMINATOR," "EDITOR," "IPOWNER" and "OTHER."ï¿½ Allowable values for the TYPE attribute are "INDIVIDUAL," "ORGANIZATION" or "OTHER." 

http://www.loc.gov/standards/mets/METSOverview.v2.html


   */
  
  //EXTERNAL DESCRIPTIVE METADATA
  //  not sure if there usually is any...

  //INTERNAL DESCRIPTIVE METADATA
  //
  $dmdSecs[]=array(
		   'id'=>'dmd001',
		   
		   );

  //ADMINISTRATIVE METADATA

  //FILES

  //STRUCTURAL MAP OF DOCUMENT

  //LINKS

  //BEHAVIORS

  public $supports_push = true;
  public $supports_pull = true;

  public $active = 0;
  public $installed = 0;

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