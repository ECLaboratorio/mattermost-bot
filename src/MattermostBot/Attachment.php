<?php

namespace MattermostBot;
class Attachment
{
    private $fallback;
    private $color;
    private $pretext;
    private $authorName;
    private $authorLink;
    private $authorIcon;
    private $title;
    private $text;
    private $titleLink;
    private $imageUrl;
    private $thumbUrl;
    private $actions = [];
    private $fields = [];

    /**
     * @param mixed $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @param mixed $fallback
     */
    public function setFallback($fallback)
    {
        $this->fallback = $fallback;
    }

    /**
     * @param mixed $color
     */
    public function setColor($color)
    {
        $this->color = $color;
    }

    /**
     * @param mixed $pretext
     */
    public function setPretext($pretext)
    {
        $this->pretext = $pretext;
    }

    /**
     * @param mixed $authorName
     */
    public function setAuthorName($authorName)
    {
        $this->authorName = $authorName;
    }

    /**
     * @param mixed $authorLink
     */
    public function setAuthorLink($authorLink)
    {
        $this->authorLink = $authorLink;
    }

    /**
     * @param mixed $authorIcon
     */
    public function setAuthorIcon($authorIcon)
    {
        $this->authorIcon = $authorIcon;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @param mixed $titleLink
     */
    public function setTitleLink($titleLink)
    {
        $this->titleLink = $titleLink;
    }

    /**
     * @param mixed $imageUrl
     */
    public function setImageUrl($imageUrl)
    {
        $this->imageUrl = $imageUrl;
    }

    /**
     * @param mixed $thumbUrl
     */
    public function setThumbUrl($thumbUrl)
    {
        $this->thumbUrl = $thumbUrl;
    }

    public function addFieldByText($title, $value, $short = false)
    {
        $field = new AttachmentField();
        $field->setTitle($title);
        $field->setValue($value);
        $field->setShort($short);
        $this->addField($field);
    }

    public function addField(AttachmentField $field)
    {
        $this->fields[] = $field;
    }

    public function addAction(AttachmentAction $action)
    {
        $this->actions[] = $action;
    }

    public function getObject()
    {
        $obj = new \stdClass();
        if (!empty($this->fallback)) {
            $obj->fallback = $this->fallback;
        } else {
            $obj->fallback = "...";
        }

        if (!empty($this->color)) {
            $obj->color = $this->color;
        }
        if (!empty($this->text)) {
            $obj->text = $this->text;
        }

        if (!empty($this->pretext)) {
            $obj->pretext = $this->pretext;
        }
        if (!empty($this->authorName)) {
            $obj->author_name = $this->authorName;
        }
        if (!empty($this->authorLink)) {
            $obj->author_link = $this->authorLink;
        }
        if (!empty($this->authorIcon)) {
            $obj->author_icon = $this->authorIcon;
        }
        if (!empty($this->title)) {
            $obj->title = $this->title;
        }
        if (!empty($this->titleLink)) {
            $obj->title_link = $this->titleLink;
        }
        if (!empty($this->imageUrl)) {
            $obj->image_url = $this->imageUrl;
        }
        if (!empty($this->thumbUrl)) {
            $obj->thumb_url = $this->thumbUrl;
        }
        if (count($this->fields) > 0) {
            $obj->fields = array();
            foreach ($this->fields as $field) {
                $obj->fields[] = $field->getObject();
            }
        }
        if (count($this->actions) > 0) {
            $obj->actions = array();
            foreach ($this->actions as $action) {
                $obj->actions[] = $action->getObject();
            }
        }
        return $obj;
    }


}