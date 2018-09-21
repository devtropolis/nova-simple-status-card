<?php

namespace Devtropolis\NovaSimpleStatusCard;

use Laravel\Nova\Card;

class NovaSimpleStatusCard extends Card
{
    /**
     * The width of the card (1/3, 1/2, or full).
     *
     * @var string
     */
    public $width = '1/3';

    /**
     * Get the component name for the element.
     *
     * @return string
     */
    public function component()
    {
        return 'nova-simple-status-card';
    }

    public function options($options=[])
    {
        $defaultOptions = array("title" => "Default Title",
            "fetchInterval" => 10000,
            "url" => null);
        $metaOptions = array_merge($defaultOptions,$options);
        return $this->withMeta($metaOptions);
    }

}
