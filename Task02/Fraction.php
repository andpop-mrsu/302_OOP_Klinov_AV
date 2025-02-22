<?php

class Fraction
{
    private $numer;
    private $denom;

    public function __construct($numer, $denom)
    {
        if (!is_int($numer)) {
            throw new InvalidArgumentException("Числитель должен быть целым числом!");
        }

        if (!(is_int($denom) && $denom > 0)) {
            throw new InvalidArgumentException("Знаменатель должен быть натуральным числом!");
        }

        $this->numer = $numer;
        $this->denom = $denom;

        $this->normalize();
    }

    private function normalize()
    {
        $gcd = $this->gcd(abs($this->numer), abs($this->denom));
        $this->numer /= $gcd;
        $this->denom /= $gcd;
    }

    private function gcd($a, $b)
    {
        while ($b) {
            $temp = $b;
            $b = $a % $b;
            $a = $temp;
        }

        return $a;
    }

    public function getNumer()
    {
        return $this->numer;
    }

    public function getDenom()
    {
        return $this->denom;
    }

    public function add(Fraction $frac)
    {
        $newNumer = $this->numer * $frac->denom + $frac->numer * $this->denom;
        $newDenom = $this->denom * $frac->denom;

        return new Fraction($newNumer, $newDenom);
    }

    public function sub(Fraction $frac)
    {
        $newNumer = $this->numer * $frac->denom - $frac->numer * $this->denom;
        $newDenom = $this->denom * $frac->denom;

        return new Fraction($newNumer, $newDenom);
    }

    public function __toString()
    {
        if ($this->denom == 1) {
            return (string)$this->numer;
        }

        $wholePart = intval($this->numer / $this->denom);
        $fracNumer = abs($this->numer % $this->denom);

        if ($fracNumer == 0) {
            return (string)$wholePart;
        } elseif ($wholePart != 0) {
            return sprintf("%d'%d/%d", $wholePart, $fracNumer, $this->denom);
        } else {
            return sprintf("%d/%d", $this->numer, $this->denom);
        }
    }
}