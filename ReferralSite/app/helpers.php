<?php
// A helper function to get points for each level

use App\Models\Refer;

function getPointsForEachLevel(int $level):int {
    if ($level > 10)
    return 0;

    return 11 - $level;
}

function getReferralText(int $user_id):string {
    return Refer::where('refer_id', $user_id)->value('referral_text');
}