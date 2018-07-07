<?php

class Code128
{
    const TYPE_128 = 104;
    const TYPE_CLOSE = 106;

    public function encode(string $str): string
    {
        $checksum = 104;
        for ($i = 0; $i < strlen($str); $i++) {
            $checksum += (($i + 1) * (ord($str[$i]) - 32));
        }

        $checksumMod = $checksum % 103;
        $checksumChar = chr($checksumMod + 32 > 126 ? $checksumMod + 32 + 18 : $checksumMod + 32);

        return chr(self::TYPE_128 + 100) . $str . $checksumChar . chr(self::TYPE_CLOSE + 100);
    }
}