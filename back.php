<?php

$json = file_get_contents('./leaderboard.json');
$json_data = json_decode($json, true);

//helper functions
function SortHighLow($a, $b)
{
    return $a['rank'] - $b['rank'];
}

function SortLowHigh($a, $b)
{
    return $b['rank'] - $a['rank'];
}

//methods
function ListHightolow($a)
{
    usort($a, 'SortHighLow');
    return json_encode($a);
}

function ListLowtohigh($a)
{
    usort($a, 'SortLowHigh');
    return json_encode($a);
}

function BestRankedPlayer($a)
{
    usort($a, 'SortHighLow');
    return json_encode($a[0]);
}

function WorstRankedPlayer($a)
{
    usort($a, 'SortLowHigh');
    return json_encode($a[0]);
}

//calls
if ($_POST['request'] === "1") {
    echo ListHightolow($json_data);
} else if ($_POST['request'] === "2") {
    echo ListLowtohigh($json_data);
} else if ($_POST['request'] === "3") {
    echo BestRankedPlayer($json_data);
} else if ($_POST['request'] === "4") {
    echo WorstRankedPlayer($json_data);
}