<?php

namespace Telnyx;

class CallControlApplicationTest extends TestCase
{
    const TEST_RESOURCE_ID = '123';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v2/call_control_application'
        );
        $resources = CallControlApplication::all();
        $this->assertInstanceOf(\Telnyx\Collection::class, $resources);
        $this->assertInstanceOf(\Telnyx\CallControlApplication::class, $resources['data'][0]);
    }

    public function testIsCreatable()
    {
        $this->expectsRequest(
            'post',
            '/v2/call_control_application'
        );
        $resource = CallControlApplication::create([
            "connection_name" => "office-connection"
        ]);
        $this->assertInstanceOf(\Telnyx\CallControlApplication::class, $resource);
    }

    public function testIsDeletable()
    {
        $resource = CallControlApplication::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'delete',
            '/v2/call_control_application/' . urlencode(self::TEST_RESOURCE_ID)
        );
        $resource->delete();
        $this->assertInstanceOf(\Telnyx\CallControlApplication::class, $resource);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v2/call_control_application/' . urlencode(self::TEST_RESOURCE_ID)
        );
        $resource = CallControlApplication::retrieve(self::TEST_RESOURCE_ID);
        $this->assertInstanceOf(\Telnyx\CallControlApplication::class, $resource);
    }

    public function testIsUpdatable()
    {
        $this->expectsRequest(
            'patch',
            '/v2/call_control_application/' . urlencode(self::TEST_RESOURCE_ID)
        );
        $resource = CallControlApplication::update(self::TEST_RESOURCE_ID, [
            "connection_name" => "office-connection"
        ]);
        $this->assertInstanceOf(\Telnyx\CallControlApplication::class, $resource);
    }
}