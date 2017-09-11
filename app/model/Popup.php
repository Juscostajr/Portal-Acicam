<?php

/**
 * Created by PhpStorm.
 * User: Juscelino Jr
 * Date: 07/09/2017
 * Time: 20:13
 */
class Popup
{
    private $url;
    private $active;
    private $title;
    private $image;
    private $buttons;


    /**
     * Popup constructor.
     * @param $url
     */
    public function __construct($url = './app/data/popup.json')
    {
        $this->url = $url;
    }


    public function read(){
        $json = file_get_contents($this->url);
        $jsonObj = json_decode($json);
        $this->active = $jsonObj->itens->active;
        $this->title = $jsonObj->itens->title;
        $this->image = $jsonObj->itens->image;
        $this->buttons = $jsonObj->itens->buttons;
    }

    public function save(){

        $fp = fopen($this->url,'w');
        fwrite($fp, json_encode(['itens' => get_object_vars($this)], JSON_UNESCAPED_UNICODE));
        fclose($fp);

    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }


    /**
     * @return mixed
     */
    public function getActive() : bool
    {
        return $this->active;
    }

    /**
     * @param mixed $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }

    /**
     * @return mixed
     */
    public function getTitle() : string
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getImage() : string
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getButtons() : array
    {
        return $this->buttons;
    }

    /**
     * @param mixed $buttons
     */
    public function setButtons($buttons)
    {
        $this->buttons = $buttons;
    }

    public function jsonSerialize()
    {
        $vars = get_object_vars($this);

        return $vars;
    }


}