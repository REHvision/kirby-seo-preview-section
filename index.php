<?php
use Kirby\Exception\InvalidArgumentException;
use Kirby\Toolkit\Str;
use Kirby\Toolkit\Query;
use Kirby\Cms\Section;

Kirby::plugin('reh/seo-preview-section', [
    'sections' => [
        'seopreview' => [
            'props' => [
                'headline' => function( string $headline = 'SEO preview' ) {
                    return $headline;
                },

                'titleField' => function( string $query = 'metatitle' ) {
                    return $query;
                },
                'defaultTitle' => function( string $query = 'page.title' ) {
                    return $query;
                },
                'separator' => function( string $separator = ' ' ) {
                    return $separator;
                },
                'baseTitle' => function( string $query = 'site.title' ) {
                    return $query;
                },

                'descriptionField' => function( string $query = 'metadescription' ) {
                    return $query;
                },
                'defaultDescription' => function( string $query = 'page.text' ) {
                    return $query;
                },
            ],
            'computed' => [
                'url' => function() {
                    return $this->model()->url();
                },
                'siteTitle' => function() {
                    return site()->title()->value();
                },
                'pageTitle' => function() {
                    return $this->model()->title()->value();
                },
                'isSite' => function() {
                    if($this->model() == site()) {
                        return true;
                    } else {
                        return false;
                    }
                },

                'seoDefaultTitle' => function() {
                    return strip_tags($this->query($this->defaultTitle));
                },
                'seoBaseTitle' => function() {
                    return $this->query($this->baseTitle)->value();
                },

                'seoDefaultDescription' => function() {
                    return strip_tags( preg_replace("/<br>/", " ", $this->query($this->defaultDescription)) );
                },
            ],
            'methods' => [
                'query' => function($q) {
                    $qery = new Query($q, [
                       'site' => site(),
                       'page' => $this->model(),
                       'pages' => site()->pages()
                    ]);
                    $result = $qery->result();
                    return $result;
                }
            ]
        ]
    ]
]);
