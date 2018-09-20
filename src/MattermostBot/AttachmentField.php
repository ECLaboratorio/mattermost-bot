<?php


namespace MattermostBot;
class AttachmentField
{
    private $title;
    private $value;
    private $short = false;

    /**
     * @param mixed $text
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @param bool $short
     */
    public function setShort($short)
    {
        $this->short = $short;
    }

    public function getObject()
    {
        $obj = new \stdClass();
        $obj->title = $this->title ?? '';
        $obj->value = $this->value ?? '';
        $obj->short = $this->short ?? false;
        return $obj;
    }

}