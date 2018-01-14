<?php

namespace Asil\Otus\HomeTask_1_1;

use Asil\Otus\HomeTask_1_1\Helpers\CleanLineHelper;

/**
 * Class SimpleBracketsProcessor
 */
class SimpleBracketsProcessor
{
    const BRACKET_OPEN = '(';
    const BRACKET_CLOSE = ')';

    /**
     * @param string $line
     * @return bool
     * @throws \LengthException
     */
    public function isValidBracketLine(string $line): bool
    {
        $line = CleanLineHelper::clean($line);

        if (empty($line)) {
            throw new \LengthException('The line of the characters cannot be empty');
        }

        $charactersArr = str_split($line);
        $openBracketsCounter = 0;
        $invalidLine = false;

        for ($i = 0, $lineLength = count($charactersArr); $i < $lineLength; $i++) {
            $this->characterValidation($charactersArr[$i]);

            if ($charactersArr[$i] === self::BRACKET_OPEN) {
                $openBracketsCounter++;
            } else {
                if ($openBracketsCounter > 0 && $charactersArr[$i] === self::BRACKET_CLOSE) {
                    $openBracketsCounter--;
                } else {
                    $invalidLine = true;
                    break;
                }
            }
        }

        return $openBracketsCounter === 0 && !$invalidLine ? true : false;
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

