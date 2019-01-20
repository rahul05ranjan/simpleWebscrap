<?php 
	
	include_once 'vendor/autoload.php';

	use Symfony\Component\DomCrawler\Crawler;

	$client = new GuzzleHttp\Client();
	$res = $client->request('GET', 'http://123hindijokes.com/');
	$html = (string)$res->getBody();

	$crawler = new Crawler($html);

	$nodeValues = $crawler->filter('.statusList > li')->each(function (Crawler $node, $i) {
    	$joke = $node->text();
    	$arr = ['joke' => $joke, 'status'	=>	2, 'category'	=>	18, 	'user_id'	=>	25];
    	return $arr;
	});
	echo json_encode($nodeValues);
?>