<?php

$totalplays = 0;
$maxplays = 0;
$wins1 = 0;
$wins2 = 0;
$route = 0;

// 0 Start, how many games do you want to play?
if (isset($_POST["submit-maxplays"])) {
    setcookie("maxplays", $_POST["maxplays"]);
    setcookie("total-plays", 0);
    setcookie("wins1", 0);
    setcookie("wins2", 0);
    setcookie("final-win", "???");
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
    setcookie("total-plays", $_COOKIE["total-plays"] + 1);
    $totalplays = $_COOKIE["total-plays"] + 1;
    $maxplays = $_COOKIE['maxplays'];
}

// Game Decision & next round
if (isset($_POST["submit-2"])) {
    if ($user1 == $user2) {
        $wins1 = $_COOKIE['wins1'];
        $wins2 = $_COOKIE['wins2'];
        $route = 1;
    } elseif ($user1 == "Rock" && $user2 == "Scissors" || $user1  == "Scissors" && $user2 == "Paper" || $user1  == "Paper" && $user2 == "Rock") {
        setcookie("wins1", $_COOKIE["wins1"] + 1);
        $wins1 = $_COOKIE['wins1'] + 1;
        $wins2 = $_COOKIE['wins2'];
        $route = 2;
    } else {
        setcookie("wins2", $_COOKIE["wins2"] + 1);
        $wins1 = $_COOKIE['wins1'];
        $wins2 = $_COOKIE['wins2'] + 1;
        $route = 3;
    }
    determineWinner();
}

if (isset($_POST["play-again"])) {
    setcookie("user-1", $_COOKIE["user-1"], time() - 60);
    setcookie("user-2", $_COOKIE["user-2"], time() - 60);
}

if (isset($_POST["reset"])) {
    setcookie("maxplays", $_COOKIE["maxplays"], time() - 60);
    setcookie("total-plays", $_COOKIE["total-plays"], time() - 60);
    setcookie("user-1", $_COOKIE["user-1"], time() - 60);
    setcookie("user-2", $_COOKIE["user-2"], time() - 60);
    setcookie("wins1", $_COOKIE["wins1"], time() - 60);
    setcookie("wins2", $_COOKIE["wins2"], time() - 60);
    setcookie("final-win", $_COOKIE["final-win"], time() - 60);
}

// 3 Done, the winner is...
function determineWinner() {
    global $totalplays, $maxplays, $wins1, $wins2, $route;
    if ($totalplays == $maxplays) {
        if ($wins1 == $wins2) {
            setcookie("final-win", "Winner");
//            exit("1. wins1: $wins1, wins2: $wins2");
        } elseif ($wins1 > $wins2) {
            setcookie("final-win", "Speler 1 wint");
//            exit("2. wins1: $wins1, wins2: $wins2, route: $route");
        } elseif ($wins1 < $wins2) {
            setcookie("final-win", "Speler 2 wint");
//            exit("3. wins1: $wins1, wins2: $wins2");
        }
    }
}


header("location:index.php");
