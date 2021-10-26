<?php

class GetFitbitLog
{
    private $access_token = '';

    public function __construct()
    {
        $this->access_token = $this->getAccessToken();
    }

    private function getAccessToken()
    {
        $config = file_get_contents('config.json');
        $config = json_decode($config, true);
        return $config['access_token'];
    }

    public function getActivityLog($start_date)
    {
        $url = "https://api.fitbit.com/1/user/-/activities/list.json?afterDate={$start_date}&limit=100&offset=0&sort=desc";
        $log = $this->getLog($url);
        return $this->formatJson($log);
    }

    public function getSleepLog($start_date)
    {
        $url = "https://api.fitbit.com/1.2/user/-/sleep/list.json?afterDate={$start_date}&limit=100&offset=0&sort=desc";
        $log = $this->getLog($url);
        return $this->formatJson($log);
    }

    private function getLog($url)
    {
        $headers = [
            "Authorization: Bearer {$this->access_token}"
        ];

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $log =  curl_exec($ch);
        curl_close($ch);

        return $log;
    }

    private function formatJson($log)
    {
        $log = json_decode($log, true);
        return json_encode($log, JSON_PRETTY_PRINT);
    }
}