<?php

require_once 'vendor/autoload.php';

//          1 1 11 1 1111 111 11 
$strandA = "ACCGGCCTCCGCAAGGCGCG";
$strandB = "GCGGTGCACAAGCAATTGAC";

//寫法一
function hammingDistance($strandA, $strandB)
{
    $distance = 0;
    for ($i = 0; $i < strlen($strandA); $i++) {
        $distance += $strandA[$i] === $strandB[$i] ? 0 : 1;
    }

    return $distance;
}

//寫法二
function hammingDistance($strandA, $strandB)
{
    return collect(str_split($strandA))
            ->zip(str_split($strandB))
            ->map(function ($pair) {
                list($a, $b) = $pair;
                return $a === $b ? 0 : 1;
            })->sum();
}

dd(hammingDistance($strandA, $strandB));