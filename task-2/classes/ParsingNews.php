<?php

namespace classes;
use Sunra\PhpSimple\HtmlDomParser;

class ParsingNews
{

    protected static $instance;
    private $url = 'http://www.rbc.ru/filter/';
    private $news_div_class = 'item_medium__text';
    private $news_text_class = 'article__text';


    /**
     * Create an instance of the class
     * @return ParsingNews
     */
    public static function get_instance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new ParsingNews();
        }
        return self::$instance;
    }

    /**
     * Load html page
     * @param $url string
     * @return \simplehtmldom_1_5\simple_html_dom
     */
    private function load_html($url)
    {
        $dom = HtmlDomParser::file_get_html($url);
        return $dom;
    }

    /**
     * Get text news
     * @param $link
     * @return array
     */
    private function get_news_text($link)
    {
        $dom = $this->load_html($link);
        return $dom->find('.' . $this->news_text_class, 0)->getElementByTagName('p')->plaintext;
    }

    /**
     * Get all news list
     * @return array
     */
    public function get_newses()
    {

        $dom = $this->load_html($this->url);

        $arr = [];
        $counter = 0;
        foreach ($dom->find('.' . $this->news_div_class) as $item) {
            $arr[$counter]['link'] = $item->parent()->href;
            $arr[$counter]['title'] = trim($item->first_child()->plaintext);
            $arr[$counter]['date'] = trim($item->last_child()->plaintext);
            $arr[$counter]['img'] = $item->parent()->last_child()->children(0)->src;
            $arr[$counter]['text'] = trim($this->get_news_text($item->parent()->href));
            $counter++;
        }

        return $arr;
    }
}