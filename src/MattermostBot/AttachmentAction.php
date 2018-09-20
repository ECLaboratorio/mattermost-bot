<?php

namespace MattermostBot;
class AttachmentAction
{
    private $name;
    private $url;
    private $context = null;

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @param mixed $context
     */
    public function setContext(\stdClass $context)
    {
        $this->context = $context;
    }

    public function attachToContext($field, $value)
    {
        if ($this->context == null) {
            $this->context = new \stdClass();
        }
        $this->context->$field = $value;
    }

    public function getObject()
    {
        $obj = new \stdClass();
        $obj->name = $this->name;
        $obj->integration = new \stdClass();
        $obj->integration->url = $this->url;
        $obj->integration->context = $this->context;
        return $obj;
    }

    function __clone() {
        $this->context = clone $this->context;
    }

}