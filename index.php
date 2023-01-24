<?php


use http\QueryString;
use Renato\Curl\Http;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\RequestException;


require __DIR__ . '/vendor/autoload.php';

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

$url = "http://slim4-eloquent.test/api/users";
$client = new Client;

$promise = $client->postAsync(
    $url,
    [
        'form_params' => [
            'id' => 1
        ]
    ]
);
// $promise = $client->getAsync($url, ['verify' => false]);
$resonse = $promise->wait();




// $client->requestAsync('GET', $url)->then(
//     function (ResponseInterface $result) {
//         var_dump($result);
//     },
//     function (RequestException $e) {
//     }
// );
echo ('<pre>');
var_dump((string)$resonse->getBody());

// $response = $client->request('GET', $url, ['verify' => false]);
// $promise = $client->getAsync($url, ['verify' => false]);

// header('Content-Type:application/json; charset=UTF-8');
// echo ('<pre>');
// echo ($response->getBody()->getContents());
// die;

// $promise->then(
//     function (ResponseInterface $res) {
//         var_dump($res);
//         echo $res->getStatusCode() . "\n";
//     },
//     function (RequestException $e) {
//         echo $e->getMessage() . "\n";
//         echo $e->getRequest()->getMethod();
//     }
// );

// $request = new Request('GET', $url, ['verify' => false]);
// $promise = $client->send($request);
// echo ('<pre>');
// var_dump($promise);
// die;
// $promise->then(
//     function (ResponseInterface $res) {
//         echo $res->getStatusCode() . "\n";
//     },
//     function (RequestException $e) {
//         echo $e->getMessage() . "\n";
//         echo $e->getRequest()->getMethod();
//     }
// );


// $cr = new Http;

// // echo $cr->get("https://gorest.co.in/public/v2/users");
// echo $cr->post("https://gorest.co.in/public/v2/users");

// $curl = curl_init();

// curl_setopt_array($curl, [
//     CURLOPT_URL => "https://gorest.co.in/public/v2/users",
//     CURLOPT_SSL_VERIFYPEER => false,
//     CURLOPT_RETURNTRANSFER => true,
//     CURLOPT_ENCODING => "",
//     CURLOPT_MAXREDIRS => 10,
//     CURLOPT_TIMEOUT => 30,
//     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//     CURLOPT_CUSTOMREQUEST => "GET",
//     CURLOPT_HTTPHEADER => [
//         "Accept: */*",
//         "User-Agent: Thunder Client (https://www.thunderclient.com)"
//     ],
// ]);

// $response = curl_exec($curl);
// $err = curl_error($curl);

// curl_close($curl);

// header('Content-type: application/json');
// if ($err) {
//     echo "cURL Error #:" . $err;
// } else {
//     echo $response;
// }
