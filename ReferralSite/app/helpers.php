<?php
// A helper function to get points for each level
function getPointsForEachLevel(int $level):int {
    if ($level > 10)
    return 0;

    return 11 - $level;
}