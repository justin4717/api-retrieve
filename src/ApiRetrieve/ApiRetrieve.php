<?php
namespace ApiRes;

class ApiRes
{
    public $apiUrl = 'https://reqres.in/api';
    public  function getFromApi($options = [])
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->apiUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => !empty($options['method']) && $options['method'] === 'GET' ? 'GET' : 'POST',
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache"
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        return $response;
    }
}
