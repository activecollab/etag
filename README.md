# Etag Interface

[![Build Status](https://travis-ci.org/activecollab/etag.svg?branch=master)](https://travis-ci.org/activecollab/etag)

Tag objects and collections using etag, and validate cached values. This package contains only the interface, so actual implementation needs to be implemented in libraries that use it.

`ActiveCollab\Etag\EtagInterface` Interface says it all:

```php
/**
 * @package ActiveCollab\Etag
 */
interface EtagInterface
{
    /**
     * Return true if this state of this object can be tagged and cached on client side.
     *
     * @return boolean
     */
    public function canBeEtagged();

    /**
     * Return etag.
     *
     * $visitor_identifier is a way that we identify a particular visitor (different people can use the same browsers
     * under the same profile, and share the cache, so we need to address that).
     *
     * @param  string  $visitor_identifier
     * @param  boolean $use_cache
     * @return string
     */
    public function getEtag($visitor_identifier, $use_cache = true);

    /**
     * Check if provided etag value matches the current object state.
     *
     * $visitor_identifier is a way that we identify a particular visitor (different people can use the same browsers
     * under the same profile, and share the cache, so we need to address that).
     *
     * @param  string  $value
     * @param  string  $visitor_identifier
     * @param  boolean $use_cache
     * @return boolean
     */
    public function verifyEtag($value, $visitor_identifier, $use_cache = true);
}
```
