<?php
include ('../NuxeoAutomationClient/NuxeoAutomationAPI.php');
protected $client;
protected $session;

public function connect()
{
	$this->$client = new NuxeoPhpAutomationClient('http://localhost:8080/nuxeo/site/automation');
	$this->$session = $client->getSession('Administrator', 'Administrator');
}

public function push($itemID)
{
	$path = "testpath";  //OBVIOUSLY FIX THIS
	$filename = "testname";  //SEE ABOVE
	$properties = array(); //ITEM LEVEL METADATA HERE
	
	$request =  $session->newRequest("Document.Create")
						->set('input','doc:'.$path)
						->set('params','type','file')  		//probably not a file
						->set('params', 'name', $filename)	
						->set('params', 'properties', $properties)
						->sendRequest();
						
	$docPath = $request->getPath();
	$files = array();  //obviously fix this
	//Attach files
	foreach($files as $file)
	{
		$fileProperties = array(); //OBVIOUSLY FIX THIS
		//populate path, properties variables
		attachFile($docPath,$fileProperties);
	}
}

protected function attachFile($path,$properties)
{
	//Upload the file
	$request =  $session->newRequest("Blob.Attach")
						->set('params', 'document', $path)
            			->loadBlob($blob, $blobtype)
            			->sendRequest();
	
}

function pull()
{
	return("Not yet implemented");
	
}

function disconnect()
{
	
}

?>