<?php
/**
 * Created by PhpStorm.
 * User: mike
 * Date: 7/13/16
 * Time: 10:48 PM
 */

namespace App\Classes;


use ErrorException;
use Illuminate\Http\Exception\HttpResponseException;
use Mockery\CountValidator\Exception;

class EventfulRestClient
{

    public $apiKey;

    public $baseUrl;
    
    public $method;

    public $xml;
    
    public function __construct()
    {
        $this->apiKey = config('eventful.api_key');
        
        $this->baseUrl = config('eventful.base_url');
    }

    public function __call($name, $arguments)
    {
        try {
            $url = $this->baseUrl . $this->method . '/' . $name . '?app_key=' . $this->apiKey . '&page_size=20&' . implode('&', $arguments);

            \Log::info($url);

            $this->xml= collect(simplexml_load_file($url));

            return $this;

        }catch(ErrorException $e){

            return 'API method does not exist';

        }
    }

    public function result(){
        return $this->xml;
    }

}