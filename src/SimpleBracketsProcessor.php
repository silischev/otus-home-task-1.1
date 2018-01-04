<?php

namespace Asil\Otus\HomeTask_1_1;

/**
 * Class SimpleBracketsProcessor
 */
class SimpleBracketsProcessor
{
    const BRACKET_OPEN = '(';
    const BRACKET_CLOSE = ')';

    private $_line;

    /**
     * SimpleBracketsProcessor constructor.
     * @param string $line
     * @throws \LengthException
     */
    public function __construct(string $line)
    {
        if (empty($line)) {
            throw new \LengthException('The line of the characters cannot be empty');
        }

        $this->_line = $this->purifyingLine($line);
    }

    /**
     * @return bool
     */
    public function processBracketLine(): bool
    {
        $charactersArr = str_split($this->_line);
        $lineLength = sizeof($charactersArr);
        $openBracketsCounter = 0;

        for ($i = 0; $i < $lineLength; $i++) {
            $this->characterValidation($charactersArr[$i]);

            if ($charactersArr[$i] === self::BRACKET_OPEN) {
                $openBracketsCounter++;
            } else {
                if ($openBracketsCounter > 0 && $charactersArr[$i] === self::BRACKET_CLOSE) {
                    $openBracketsCounter--;
                } else {
                    return false;
                }
            }
        }

        return $openBracketsCounter === 0 ? true : false;
    }

    /**
     * Purifying string from valid special characters
     * @param string $line
     * @return string
     */
    private function purifyingLine(string $line)
    {
        $specialCharacters = ['\\t', '\\n', '\\r', ' ', chr(13), chr(10)];
        return str_replace($specialCharacters, '', $line);
    }

    /**
     * @param string $character
     * @throws \InvalidArgumentException
     */
    private function characterValidation(string $character): void
    {
        if ($character !== self::BRACKET_OPEN && $character !== self::BRACKET_CLOSE) {
            throw new \InvalidArgumentException("The line contains invalid character '{$character}'");
        }
    }
}

