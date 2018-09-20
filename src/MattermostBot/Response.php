<?php

namespace MattermostBot;
class Response
{
    const RESPONSE_IN_CHANNEL = "in_channel";
    const RESPONSE_EPHEMERAL = "ephemeral";
    private $text;
    private $responseType = "ephemeral";
    private $username;
    private $iconUrl;
    private $gotoLocation;
    private $attachments = [];
    private $type;
    private $props;
    private $channel;

    public function send()
    {
        $obj = $this->makeObject();
        header('Content-Type: application/json');
        echo json_encode($obj);
    }

    private function makeObject()
    {
        if (!isset($this->text) && !isset($this->attachments)) {
            $this->text = "(Empty Response)";
        }
        $obj = new \stdClass();
        if (!empty($this->text)) {
            $obj->text = $this->text;
        }
        if (!empty($this->responseType)) {
            $obj->response_type = $this->responseType;
        }
        if (!empty($this->username)) {
            $obj->username = $this->username;
        }
        if (!empty($this->iconUrl)) {
            $obj->icon_url = $this->iconUrl;
        }
        if (!empty($this->gotoLocation)) {
            $obj->goto_location = $this->gotoLocation;
        }
        if (!empty($this->type)) {
            $obj->type = $this->type;
        }
        if (!empty($this->props)) {
            $obj->props = $this->props;
        }
        if (!empty($this->attachments)) {
            $obj->attachments = array();
            foreach ($this->attachments as $attachment) {
                $obj->attachments[] = $attachment->getObject();
            }
        }
        return $obj;
    }

    public function sendUpdate($ephemeralMsg = null, $update = true)
    {
        $obj = $this->makeObject();
        $updateObj = new \stdClass();
        if($update){
            $updateObj->update = new \stdClass();
            $updateObj->update->props = $obj;
        }
        if ($ephemeralMsg != null) {
            $updateObj->ephemeral_text = $ephemeralMsg;
        }
        header('Content-Type: application/json');
        echo json_encode($updateObj);
    }


    public function sendIncomming($webhookUrl)
    {

        $data = $this->makeObject();
        $data->channel = $this->channel;
        $data_string = json_encode($data);
        $ch = curl_init($webhookUrl);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data_string))
        );
        $result = curl_exec($ch);
        return $result;
    }

    /**
     * @param mixed $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @param mixed $channel
     */
    public function setChannel($channel)
    {
        $this->channel = $channel;
    }

    /**
     * @param mixed $responseType
     */
    public function setResponseType($responseType)
    {
        $this->responseType = $responseType;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @param mixed $iconUrl
     */
    public function setIconUrl($iconUrl)
    {
        $this->iconUrl = $iconUrl;
    }

    /**
     * @param mixed $gotoLocation
     */
    public function setGotoLocation($gotoLocation)
    {
        $this->gotoLocation = $gotoLocation;
    }

    /**
     * @param Attachment $attachment
     */
    public function addAttachment(Attachment $attachment)
    {
        $this->attachments[] = $attachment;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @param mixed $props
     */
    public function setProps($props)
    {
        $this->props = $props;
    }


}