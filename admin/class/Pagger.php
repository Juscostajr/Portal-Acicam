<?php

/**
 * Created by PhpStorm.
 * User: Juscelino Jr
 * Date: 11/10/2016
 * Time: 16:59
 */
class Pagger
{
    private $ref;
    private $max;
    private $min;
    private $href;
    private $linkList = array();



    /**
     * @return array
     */
    public function getLinkList()
    {
        return $this->linkList;
    }

    /**
     * Pagger constructor.
     * @param $href
     */
    public function __construct($href)
    {
        $ref = isset($_GET['ref']) ? $_GET['ref'] : null;
        $this->ref = $ref > 5 ? $ref : 5;
        $this->max = $this->ref+4;
        $this->min = $this->ref-5;
        $this->href = $href;

        $hasAtrr = parse_url($href, PHP_URL_QUERY);
        $href .= ($hasAtrr) ? '&ref=' : '?ref=';

        for ($i = $this->min;$i <= $this->max; $i++):
            array_push($this->linkList,$href . $i);
        endfor;
    }

    /**
     * @return mixed
     */
    public function getMax()
    {
        return $this->max;
    }

    /**
     * @return mixed
     */
    public function getMin()
    {
        return $this->min;
    }

    public function getPosition($key){
        return $this->min + $key;
    }


    public function getPagger(){
        $html  = '<ul class="pagination">';
        $html .= "<li><a href='$this->href&ref=1'><<</a></li>";
        for ($i = $this->min;$i <= $this->max; $i++){
            $html .= "<li><a href='$this->href&ref=$i'>$i</a></li>";
        }
        $html .= '</ul>';
        return $html;

    }

}