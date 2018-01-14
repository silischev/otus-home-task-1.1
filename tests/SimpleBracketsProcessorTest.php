<?php

namespace Asil\Otus\HomeTask_1_1;

use PHPUnit\Framework\TestCase;

class SimpleBracketsProcessorTest extends TestCase
{
    /**
     * @dataProvider validData
     * @param $string
     * @param $returnValue
     */
    public function testValid($string, $returnValue)
    {
        $bracketsProcessor = new SimpleBracketsProcessor();
        $this->assertSame($returnValue, $bracketsProcessor->isValidBracketLine($string));
    }

    /**
     * @dataProvider invalidData
     * @param $string
     * @param $returnValue
     */
    public function testInvalid($string, $returnValue)
    {
        $bracketsProcessor = new SimpleBracketsProcessor();
        $this->assertSame($returnValue, $bracketsProcessor->isValidBracketLine($string));
    }

    /**
     * @dataProvider invalidDataWithExceptions
     * @param $string
     */
    public function testInvalidWithExceptions($string)
    {
        $this->expectException(\InvalidArgumentException::class);
        $bracketsProcessor = new SimpleBracketsProcessor();
        $bracketsProcessor->isValidBracketLine($string);
    }

    /**
     * @dataProvider emptyDataWithExceptions
     * @param $string
     */
    public function testEmptyWithExceptions($string)
    {
        $this->expectException(\LengthException::class);
        $bracketsProcessor = new SimpleBracketsProcessor();
        $bracketsProcessor->isValidBracketLine($string);
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

    public function emptyDataWithExceptions()
    {
        return [
            [''],
            ['
            '],
            ['  ']
        ];
    }
}
