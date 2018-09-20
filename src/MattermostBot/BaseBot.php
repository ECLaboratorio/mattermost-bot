<?php
namespace MattermostBot;

class BaseBot
{
    protected $message;
    private $tokens;
    private $users;

    public function __construct(IncomingSlash $message, array $tokens = [], array $users = [])
    {
        $this->tokens = $tokens;
        $this->users = $users;
        $this->message = $message;
    }

    public function execute()
    {
        if (!$this->isValidToken()) {
            return false;
        }
        if (!$this->isValidUser()) {
            return false;
        }

        return $this->process();

    }

    protected function isValidToken()
    {
        if (in_array($this->message->getToken(), $this->tokens)) {
            return true;
        }
        $this->respond("Invalid Token");
        return false;

    }

    protected function respond($txt)
    {
        $response = new Response();
        $response->setText($txt);
        $this->sendMessage($response);
    }

    protected function sendMessage(Response $response)
    {
        $response->send();
    }

    protected function isValidUser()
    {
        if (!empty($this->users) && is_array($this->users) && count($this->users) > 0) {
            if (in_array($this->message->getUserName(), $this->users)) {
                return true;
            }
            $this->respond("User not authorized");
            return false;
        }
        return true;
    }

    protected function process()
    {
        $this->respond("You should implement process function in your own bot");
    }
}