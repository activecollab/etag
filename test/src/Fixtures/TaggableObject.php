<?php

namespace ActiveCollab\Etag\Test\Fixtures;

use ActiveCollab\Etag\EtagInterface;
use ActiveCollab\Etag\EtagInterface\Implementation as EtagInterfaceImplementation;

/**
 * @package ActiveCollab\Etag\Test\Fixtures
 */
class TaggableObject implements EtagInterface
{
    use EtagInterfaceImplementation;

    /**
     * Return true if this object can be tagged and cached on client side
     *
     * @return bool|null
     */
    public function canBeEtagged()
    {
        return true;
    }

    /**
     * Return etag
     *
     * @param  string  $visitor_identifier
     * @param  boolean $use_cache
     * @return string
     */
    public function getEtag($visitor_identifier, $use_cache = true)
    {
        return $use_cache ? "cached_for_$visitor_identifier" : "live_for_$visitor_identifier";
    }
}
