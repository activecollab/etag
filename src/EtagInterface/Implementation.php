<?php

namespace ActiveCollab\Etag\EtagInterface;

/**
 * @package ActiveCollab\Etag\EtagInterface
 */
trait Implementation
{
    /**
     * Check if provided etag value match the current record
     *
     * @param  string  $value
     * @param  string  $visitor_identifier
     * @param  boolean $use_cache
     * @return boolean
     */
    public function verifyEtag($value, $visitor_identifier, $use_cache = true)
    {
        return $this->getEtag($visitor_identifier, $use_cache) === $value;
    }

    // ---------------------------------------------------
    //  Expectations
    // ---------------------------------------------------

    /**
     * Return etag
     *
     * @param  string  $visitor_identifier
     * @param  boolean $use_cache
     * @return string
     */
    abstract public function getEtag($visitor_identifier, $use_cache = true);
}
