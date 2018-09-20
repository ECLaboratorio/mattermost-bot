<?php

namespace MattermostBot;
class IncomingAction
{
    private $content = false;
    private $userId;
    private $context;

    public function __construct()
    {
        $content = file_get_contents('php://input');

        $this->content = json_decode($content);
        $this->load();

    }

    private function load()
    {

        $this->userId = $this->content->user_id;
        $this->context = $this->content->context;
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
    public function getContext()
    {
        return $this->context;
    }


}