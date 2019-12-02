<?php namespace App\SupportedApps\Emoncms;

class Emoncms extends \App\SupportedApps implements \App\EnhancedApps {

    public $config;

    //protected $login_first = true; // Uncomment if api requests need to be authed first
    //protected $method = 'POST';  // Uncomment if requests to the API should be set by POST

    function __construct() {
        //$this->jar = new \GuzzleHttp\Cookie\CookieJar; // Uncomment if cookies need to be set            
    }

    public function test()
    {
        $attrs = [
            'headers'  => ['Accept' => 'application/json']
        ];
        $test = parent::appTest($this->url('feed/timevalue.json');
        echo $test->status;
    }

    public function livestats()
    {
        $status = 'inactive';
        $res = parent::execute($this->url('status'));
        $details = json_decode($res->getBody());

        $data = [];
        return parent::getLiveStats($status, $data);
        
    }
    public function url($endpoint)
    {
        $api_url = parent::normaliseurl($this->config->url).$endpoint.'?apikey='.$this->config->apikey.'&id='.$this->config->feedId);
        return $api_url;
    }
}
