<?php


namespace Jarvishubtech\NumToWord;


class NumToWord
{
    public function getWord($number)
    {
        return $this->convertNumberToWord($this->sanitiseNumber($number));
    }

    private function convertNumberToWord(int $number = 0):string
    {
        $onToHundred = config('num-to-word-ind.oneToHundred');
        $mileStone = config('num-to-word-ind.milestone');

        $ls3 = substr($number, -3);
        $ls3 = str_repeat('0', 4 - strlen($ls3)) . $ls3;

        $ms = substr($number, 0, -3);
        $ms  = strlen($ms) % 2 ? '0' . $ms : $ms;

        $lines1 = str_split($ls3, 2);
        $lines2 = str_split($ms, 2);

        $lines = array_merge($lines2, $lines1);
        $count = count($lines);
        $word = '';
        foreach($lines as $line)
        {
            --$count;
            $value = (int) $line;
            $word .= $value ? $onToHundred[$value] . $mileStone[$count] : '';
        }
        return $word ?: 'zero';
    }

    private function sanitiseNumber($number):float
    {
        return (float)str_replace([',',' '], '',$number);
    }
}
