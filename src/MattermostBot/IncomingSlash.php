<?php

namespace MattermostBot;
class IncomingSlash
{
    private $arrayContent = false;
    private $isValidWebhook = true;
    private $channelId;
    private $channelName;
    private $command;
    private $responseUrl;
    private $teamDomain;
    private $teamId;
    private $text;
    private $token;
    private $userId;
    private $userName;

    public function __construct()
    {
        $this->arrayContent = $_POST;
        $this->load();

    }

    private function load()
    {
        $this->channelId = $this->arrayContent['channel_id'];
        $this->channelName = $this->arrayContent['channel_name'];
        $this->command = $this->arrayContent['command'];
        $this->responseUrl = $this->arrayContent['response_url'];
        $this->teamDomain = $this->arrayContent['team_domain'];
        $this->teamId = $this->arrayContent['team_id'];
        $this->text = $this->arrayContent['text'];
        $this->token = $this->arrayContent['token'];
        $this->userId = $this->arrayContent['user_id'];
        $this->userName = $this->arrayContent['user_name'];
    }

    /**
     * @return bool
     */
    public function isValidWebhook()
    {
        return $this->isValidWebhook;
    }

    /**
     * @return mixed
     */
    public function getChannelId()
    {
        return $this->channelId;
    }

    /**
     * @return mixed
     */
    public function getChannelName()
    {
        return $this->channelName;
    }

    /**
     * @return mixed
     */
    public function getCommand()
    {
        return $this->command;
    }

    /**
     * @return mixed
     */
    public function getResponseUrl()
    {
        return $this->responseUrl;
    }

    /**
     * @return mixed
     */
    public function getTeamDomain()
    {
        return $this->teamDomain;
    }

    /**
     * @return mixed
     */
    public function getTeamId()
    {
        return $this->teamId;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @return mixed
     */
    public function getUserName()
    {
        return $this->userName;
    }


}