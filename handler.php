<?php

// Local Vars
$totalplays = 0;
$maxplays = 0;
$wins1 = 0;
$wins2 = 0;
$route = 0;

// 0 Start, how many games do you want to play?
if (isset($_POST["submit-maxplays"])) {
    setcookie("maxplays", $_POST["maxplays"]);
    setcookie("totalplays", 0);
    setcookie("wins1", 0);
    setcookie("wins2", 0);
}

$user1 = isset($_POST['user-1']) ? $_POST['user-1'] : $_COOKIE['user-1'];
$user2 = isset($_POST['user-2']) ? $_POST['user-2'] : $_COOKIE['user-2'];

// Choice player 1
if (isset($_POST["submit-1"])) {
    setcookie("user-1", $user1);
}
// Choice player 2
if (isset($_POST["submit-2"])) {
    setcookie("user-2", $user2);
    setcookie("totalplays", $_COOKIE["totalplays"] + 1);
    $totalplays = $_COOKIE["totalplays"] + 1;
    $maxplays = $_COOKIE["maxplays"];
}
// Game Decision & next round
if (isset($_POST["submit-2"])) {
    if ($user1 == $user2) {
        $wins1 = $_COOKIE['wins1'];
        $wins2 = $_COOKIE['wins2'];
    } elseif ($user1  == "Rock" && $user2 == "Scissors" || $user1  == "Scissors" && $user1 == "Paper" || $user1  == "Paper" && $user2 == "Rock") {
        setcookie("wins1", $_COOKIE["wins1"] + 1);
        $wins1 = $_COOKIE['wins1'] + 1;
        $wins2 = $_COOKIE['wins2'];
    } else {
        setcookie("wins2", $_COOKIE["wins2"] + 1);
        $wins1 = $_COOKIE['wins1'];
        $wins2 = $_COOKIE['wins2'] + 1;
    }
    determineWinner();
}

// Next Round
if (isset($_POST["play-again"])) {
    setcookie("user-1", $_COOKIE["user-1"], time() - 60);
    setcookie("user-2", $_COOKIE["user-2"], time() - 60);
}

// Reset Game
if (isset($_POST["reset"])) {
    setcookie("maxplays", $_COOKIE["maxplays"], time() - 60);
    setcookie("totalplays", $_COOKIE["totalplays"], time() - 60);
    setcookie("user-1", $_COOKIE["user-1"], time() - 60);
    setcookie("user-2", $_COOKIE["user-2"], time() - 60);
    setcookie("wins1", $_COOKIE["wins1"], time() - 60);
    setcookie("wins2", $_COOKIE["wins2"], time() - 60);
    setcookie("final-win", $_COOKIE["final-win"], time() - 60);
}

// 3 Done, the winner is...
function determineWinner()
{
    global $totalplays, $maxplays, $wins1, $wins2;
    if ($totalplays == $maxplays) {
        if ($wins1 == $wins2) {
            setcookie("final-win", "Gelijkspel");
        } elseif ($wins1 > $wins2) {
            setcookie("final-win", "Speler 1 wint");
        } elseif ($wins1 < $wins2) {
            setcookie("final-win", "Speler 2 wint");
        }
    }
}
header("location:game.php");
