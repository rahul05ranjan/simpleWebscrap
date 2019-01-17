<?php 
	
	include_once 'vendor/autoload.php';

	use Symfony\Component\DomCrawler\Crawler;

	$client = new GuzzleHttp\Client();
	$res = $client->request('GET', 'http://123hindijokes.com/');
	$html = (string)$res->getBody();

	$crawler = new Crawler($html);

	// foreach ($crawler as $domElement) {
	//     var_dump($domElement->nodeName);
	// }
	$nodeValues = $crawler->filter('.statusList > li')->each(function (Crawler $node, $i) {
    	$joke = $node->text();
    	$arr = ['joke' => $joke, 'status'	=>	2, 'category'	=>	18, 	'user_id'	=>	25];
    	echo  "<pre>";
    	print_r($arr);
	});

?>