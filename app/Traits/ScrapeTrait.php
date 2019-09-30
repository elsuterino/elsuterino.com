<?php


namespace App\Traits;


use Symfony\Component\DomCrawler\Crawler;

trait ScrapeTrait
{
    protected function getConfig(String $provider)
    {
        $config = config("job.providers.{$provider}", null);

        if (!$config) {
            logger('Indeed config not set, exiting.');

            exit();
        }

        return $config;
    }

    protected function firstNodeLink(Crawler $node, String $selector)
    {
        $node = $node->filter($selector);

        if (!count($node)) {
            return null;
        }

        return $node->first()->link()->getUri();
    }

    protected function firstNodeAttribute(Crawler $node, String $selector, String $attribute, String $prefix = null)
    {
        $node = $node->filter($selector);

        if (!count($node)) {
            return null;
        }

        $attr = $node->first()->attr($attribute) ?? null;

        return $prefix . $attr;
    }
}
