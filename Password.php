<?php
namespace P2;

class Password
{
    # Properties
    private $charList = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p',
        'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];

    # Methods
    public function __construct()
    {
    }

    public function generateRandomPassword(int $numChars, bool $includeNumber, string $includeSpecialChar)
    {
        $password = "";
        $positionOfNumber = rand(0, $numChars - 1);
        $positionOfSpecialChar = rand(0, $numChars - 1);
        while ($positionOfNumber == $positionOfSpecialChar) {
            $positionOfSpecialChar = rand(0, $numChars - 1);
        }

        for ($index = 0; $index < $numChars; $index++) {
            if ($includeNumber and $index == $positionOfNumber) {
                $password = $password . rand(0, 9);
            } else if ($includeSpecialChar != 'choose' and $index == $positionOfSpecialChar) {
                $password = $password . $includeSpecialChar;
            } else {
                $password = $password . $this->charList[rand(0, 25)];
            }
        }

        return $password;
    }
}