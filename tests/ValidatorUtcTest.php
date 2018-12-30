<?php

use Penance316\Validators\IsoDateValidator;
use PHPUnit\Framework\TestCase;

require_once(__DIR__ . '/../src/IsoDateValidator.php');

class ValidatorUtcTest extends TestCase {

    function testDates()
    {
        $validator = new IsoDateValidator();

        // Invalid

        $res = $validator->validateIsoDate(null, '123456', ['utc'], null);
        $this->assertFalse($res);

        $res = $validator->validateIsoDate(null, '2009-05-19 14:', ['utc'], null);
        $this->assertFalse($res);

        $res = $validator->validateIsoDate(null, '2010-02-18T16:23.35:48.45', ['utc'], null);
        $this->assertFalse($res);

        $res = $validator->validateIsoDate(null, '2010-02-18', ['utc'], null);
        $this->assertFalse($res);

        $res = $validator->validateIsoDate(null, '2010-02-18T16:23:35', ['utc'], null);
        $this->assertFalse($res);

        $res = $validator->validateIsoDate(null, '2010-02-18 16:23:35', ['utc'], null);
        $this->assertFalse($res);

        $res = $validator->validateIsoDate(null, '2009-05-19 14:39:22-06:00', ['utc'], null);
        $this->assertFalse($res);

        $res = $validator->validateIsoDate(null, '-2012-04-23T18:25:43.511Z', ['utc'], null);
        $this->assertFalse($res);

        $res = $validator->validateIsoDate(null, '18:25:43.511Z', ['utc'], null);
        $this->assertFalse($res);

        // Valid

        $res = $validator->validateIsoDate(null, '2012-04-23T18:25:43.511Z', ['utc'], null);
        $this->assertTrue($res);

        $res = $validator->validateIsoDate(null, '2018-12-31T00:00:00-0300', ['utc'], null);
        $this->assertTrue($res);
    }
}
