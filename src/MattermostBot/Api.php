<?php

namespace MattermostBot;

use MattermostBot\Api\Error;

class Api
{
    private $server;
    private $user;
    private $password;
    private $token;

    public function __construct($server, $user, $password)
    {
        $this->server = trim($server, "/") . "/api/v4/";
        $this->user = $user;
        $this->password = $password;
    }

    /**
     * @param $id
     * @return Api\User
     */
    public function findUserById($id)
    {
        $users = $this->apiCall('users/ids',[$id]);
        $user = new Api\User();
        return $user->populateFromApi($users[0]);
    }

    private function apiCall($url, $data = null)
    {
        $this->auth(true);

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $this->server . $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization: Bearer '.$this->token
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        $result = curl_exec($ch);
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if($statusCode != 200){
            throw new Error("Unknown error");
        }
        $result = json_decode($result);
        return $result;

    }

    private function auth($force = false)
    {
        if (empty($this->token) || $force) {
            $body = new \stdClass();
            $body->login_id = $this->user;
            $body->password = $this->password;
            $headers = [];
            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, $this->server . 'users/login');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($body));
            curl_setopt($ch, CURLOPT_HEADERFUNCTION,
                function ($curl, $header) use (&$headers) {
                    $len = strlen($header);
                    $header = explode(':', $header, 2);
                    if (count($header) < 2)
                        return $len;

                    $name = strtolower(trim($header[0]));
                    if (!array_key_exists($name, $headers))
                        $headers[$name] = [trim($header[1])];
                    else
                        $headers[$name][] = trim($header[1]);

                    return $len;
                }
            );
            curl_exec($ch);
            $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

            if ($statusCode == 200) {
                $this->token = $headers['token'][0];
            } else {
                throw new Error("Error while getting auth code");
            }
        }
    }
}