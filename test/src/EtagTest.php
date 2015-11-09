<?php
namespace ActiveCollab\Etag\Test;

use ActiveCollab\Etag\Test\Fixtures\TaggableObject;

/**
 * @package ActiveCollab\Etag\Test
 */
class EtagTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test if taggable object can be tagged
     */
    public function testCanBeEtagged()
    {
        $this->assertTrue((new TaggableObject)->canBeEtagged());
    }

    /**
     * Test cached tag
     */
    public function testCachedTag()
    {
        $this->assertEquals('cached_for_ilija.studen@activecollab.com', (new TaggableObject)->getEtag('ilija.studen@activecollab.com'));
    }

    /**
     * Test live tag
     */
    public function testLiveTag()
    {
        $this->assertEquals('live_for_ilija.studen@activecollab.com', (new TaggableObject)->getEtag('ilija.studen@activecollab.com', false));
    }

    /**
     * Test verify cached tag
     */
    public function testVerifyCachedTag()
    {
        $taggable_object = new TaggableObject();

        $this->assertTrue($taggable_object->verifyEtag('cached_for_ilija.studen@activecollab.com', 'ilija.studen@activecollab.com'));
        $this->assertFalse($taggable_object->verifyEtag('cached_for_ilija.studen@activecollab.com', 'ilija.studen@activecollab.com', false));
    }

    /**
     * Test verify live tag
     */
    public function testVerifyLiveTag()
    {
        $taggable_object = new TaggableObject();

        $this->assertFalse($taggable_object->verifyEtag('live_for_ilija.studen@activecollab.com', 'ilija.studen@activecollab.com'));
        $this->assertTrue($taggable_object->verifyEtag('live_for_ilija.studen@activecollab.com', 'ilija.studen@activecollab.com', false));
    }
}
