<?php
$token='304674671:AAEGd9KU_jKpKDdIsjGlPyPID2jL-hIMJOQ';

$result=file_get_contents("https://api.telegram.org/bot$token/getUpdates");
$result=json_decode($result,true);
$up=end($result);
$update=end($up);
$counter=count($up);
$userid=$update['message']['chat']['id'];
$message=$update['message']['text'];

if($message=='/start'){
$key=array(array('پیگیری دستگاه','راهنما','ارتباط با ما'));
$post=array('keyboard'=>$key,'one_time_keyboard'=>true,'resize_keyboard'=>true);

$text="welcome to sepaco holding";
$url="https://api.telegram.org/bot$token/sendMessage?chat_id=$userid&text=".$text."&reply_markup=".json_encode($post);

execute($url);

	
}


elseif($message=='راهنما'){
	
	$text="روی دکمه پیگیری کلیک و شماره سریال دستگاه را وارد نمایید.";
	$url="https://api.telegram.org/bot$token/sendMessage?chat_id=$userid&text=".$text;
	execute($url);
}
elseif($message=='پیگیری دستگاه'){
	
	
$text="شماره سریال دستگاه را وارد نمایید:";
	
	$url="https://api.telegram.org/bot$token/sendMessage?chat_id=$userid&text=".$text;
	execute($url);
		
		
		
/*
$update=file_get_contents("https://api.telegram.org/bot$token/getUpdates");
$update=json_decode($update,true);
$update=end($update);
$update=end($update);
$userid=$update['message']['chat']['id'];
$message=$update['message']['text'];
	*/
	}
	
	
	if($up[$counter-2]['message']['text']=='پیگیری دستگاه')
	{$xml=simplexml_load_file("info.xml") or die("Error: Cannot create object");
		$c=count($xml->costumer);
		for($i=0;$i<$c;$i++){
			
			if($xml->costumer[$i]->deviceSerial==$update['message']['text'])
				
			$text="hi\nfriend";
		//$text=$xml->costumer[$i]->company."<br />".$xml->costumer[$i]->deviceSerial;
			//  $xml->costumer[$i]->fult.
			//  $xml->costumer[$i]->serviceInfo;
		$url="https://api.telegram.org/bot$token/sendMessage?chat_id=$userid&text=".$text."&parse_mode=HTML";
		execute($url);
		break;}
		}

	
		
	



	
///elseif($message=='about us'){
	
	
	
//}
else {
	$text="Please enter right command!";
	$url="https://api.telegram.org/bot$token/sendMessage?chat_id=$userid&text=".$text;
	execute($url);}



function execute($url){
$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);

$obj=curl_exec($ch);
var_dump($obj);
}

		

		/*$content=file_get_contents("php://input");
$update=json_decode($content,true);
if($update["message"]["text"]=="/start")
}
$url="https://api.telegram.org/bot$token/sendMessage?chat_id=".$update["message"]["chat"]["id"]."&text=hi";	
*/



		
		
		
?>