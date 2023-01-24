<?php

namespace Renato\Curl;


class Http
{
    public function get($url, $data = [])
    {
        return $this->curl("GET", $url, $data);
    }

    public function post($url, $data = [])
    {
        return $this->curl("POST", $url, $data);
    }


    /**
     * Method curl
     *
     * @param string $method GET, POST, PUT, PATCH, DELETE, OPTIONS
     * @param string $url url http//dddd.com
     * @param array $data ['id'=>'1','genre'=>'M']
     *
     * @return json
     */
    private function curl($method, $url, $data = [])
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_POSTFIELDS => $data, //"id=123&nome=dfgdf",
            CURLOPT_HTTPHEADER => [
                "Accept: */*",
                "User-Agent: Thunder Client (https://www.thunderclient.com)"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        header('Content-type: application/json');

        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            return $response;
        }
    }
}
