<?php

use Penance316\Validators\IsoDateValidator;
use PHPUnit\Framework\TestCase;

require(__DIR__ . '/../src/IsoDateValidator.php');

class ValidatorsTest extends TestCase {

    function testDates()
    {
        $validator = new IsoDateValidator();

        // Invalid

        $res = $validator->validateIsoDate(null, '123456', null, null);
        $this->assertFalse($res);

        $res = $validator->validateIsoDate(null, '2009-05-19 14:', null, null);
        $this->assertFalse($res);

        $res = $validator->validateIsoDate(null, '2010-02-18T16:23.35:48.45', null, null);
        $this->assertFalse($res);

        // Valid

        $res = $validator->validateIsoDate(null, '2012-04-23T18:25:43.511Z', null, null);
        $this->assertTrue($res);

        $res = $validator->validateIsoDate(null, '2009-05-19 14:39:22-06:00', null, null);
        $this->assertTrue($res);

        $res = $validator->validateIsoDate(null, '2010-02-18T16:23.33+0600', null, null);
        $this->assertTrue($res);
    }
}
