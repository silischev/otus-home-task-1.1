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
    private $_specialCharacters;

    /**
     * SimpleBracketsProcessor constructor.
     * @param string $line
     * @throws \LengthException
     */
    public function __construct(string $line)
    {
        $this->_specialCharacters = ['\\t', '\\n', '\\r', ' ', chr(13), chr(10)];
        $this->_line = str_replace($this->_specialCharacters, '', $line);

        if (empty($this->_line)) {
            throw new LengthException('The line of the characters cannot be empty');
        }
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
     * @param string $character
     * @throws \InvalidArgumentException
     */
    private function characterValidation(string $character): void
    {
        if ($character !== self::BRACKET_OPEN && $character !== self::BRACKET_CLOSE) {
            throw new InvalidArgumentException("The line contains invalid character '{$character}'");
        }
    }
}

