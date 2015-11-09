<?php

namespace ActiveCollab\Etag;

/**
 * @package ActiveCollab\Etag
 */
interface EtagInterface
{
    /**
     * Return true if this object can be tagged and cached on client side
     *
     * @return bool|null
     */
    public function canBeEtagged();

    /**
     * Return etag
     *
     * @param  string  $visitor_identifier
     * @param  boolean $use_cache
     * @return string
     */
    public function getEtag($visitor_identifier, $use_cache = true);

    /**
     * Check if provided etag value match the current record
     *
     * @param  string  $value
     * @param  string  $visitor_identifier
     * @param  boolean $use_cache
     * @return boolean
     */
    public function verifyEtag($value, $visitor_identifier, $use_cache = true);
}
