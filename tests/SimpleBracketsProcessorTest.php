<?php

namespace Asil\Otus\HomeTask_1_1;

use PHPUnit\Framework\TestCase;

class SimpleBracketsProcessorTest extends TestCase
{
    /**
     * @dataProvider validData
     */
    public function testValid($string, $returnValue)
    {
        $bracketsProcessor = new SimpleBracketsProcessor($string);
        $this->assertSame($returnValue, $bracketsProcessor->processBracketLine());
    }

    /**
     * @dataProvider invalidData
     */
    public function testInvalid($string, $returnValue)
    {
        $bracketsProcessor = new SimpleBracketsProcessor($string);
        $this->assertSame($returnValue, $bracketsProcessor->processBracketLine());
    }

    /**
     * @dataProvider invalidDataWithExceptions
     */
    public function testInvalidWithExceptions($string)
    {
        $this->expectException(\InvalidArgumentException::class);
        $bracketsProcessor = new SimpleBracketsProcessor($string);
        $bracketsProcessor->processBracketLine();
    }

    public function validData()
    {
        return [
            ['()', true],
            ['(
            )', true],
            ['(     )', true],
            ['()()', true],
            ['(()())', true],
        ];
    }

    public function invalidData()
    {
        return [
            [')()', false],
            ['(()', false],
            ['(()))', false],
            ['((()())', false],
        ];
    }

    public function invalidDataWithExceptions()
    {
        return [
            ['(((z)())'],
            ['((d)'],
        ];
    }
}
