<?php


namespace Elsuterino\Traits;


use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;

trait CrawlerTrait
{
    /**
     * @param $url
     * @return Crawler
     */
    public function crawlerGet(string $url)
    {
        $client = new Client();

        $data = $client->request('get', $url);

        return $data;
    }

    public function firstNodeText(Crawler $node, String $selector)
    {
        $node = $node->filter($selector);

        if (!count($node)) {
            return null;
        }

        $text = $node->first()->text(null);

        return trim($text);
    }

    public function firstNodeLink(Crawler $node, String $selector)
    {
        $node = $node->filter($selector);

        if (!count($node)) {
            return null;
        }

        return $node->first()->link()->getUri();
    }

    public function firstNodeAttribute(Crawler $node, String $selector, String $attribute, String $prefix = null)
    {
        $node = $node->filter($selector);

        if (!count($node)) {
            return null;
        }

        $attr = $node->first()->attr($attribute) ?? null;

        return $prefix . $attr;
    }
}
