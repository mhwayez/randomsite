<?php

use Illuminate\Support\Str;
use Symfony\Component\Yaml\Yaml;

$collections = Yaml::parse(file_get_contents('./source/topics.yml'));

return [
    'baseUrl' => '',
    'production' => false,
    'siteName' => 'google',
    'siteDescription' => 'Learn Programming',
    'companyName' => 'google.com',
    'companyUrl' => 'https://www.google.com',
    // Algolia DocSearch credentials
    'docsearchApiKey' => '',
    'docsearchIndexName' => '',
    //all the topics
    'topics' => empty($collections) ? [] : $collections['topics'],
    // helpers
    'isActive' => function ($page, $path) {
        return Str::endsWith(trimPath($page->getPath()), trimPath($path));
    },
    'isActiveParent' => function ($page, $menuItem) {
        if (is_object($menuItem) && $menuItem->children) {
            return $menuItem->children->contains(function ($child) use ($page) {
                return trimPath($page->getPath()) == trimPath($child);
            });
        }
    },
    'url' => function ($page, $path) {
        return Str::startsWith($path, 'http') ? $path : '/' . trimPath($path);
    },
    'loadNavigations' => function($page){
        $path = $page->getRelativePath();
        $result = Yaml::parse(file_get_contents(__DIR__.'/source/'.$path.'/_navigation.yml'));
        return empty($result) ? [] : $result;
    },
];
