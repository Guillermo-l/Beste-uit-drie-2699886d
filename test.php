<?php

// 0 Start, how many games do you want to play?
if (isset($_POST["submit"]) && isset($_POST["max-wins"]) && !isset($_COOKIE["wins1"]) && !isset($_COOKIE["wins2"])) {
    setcookie("max-wins", $_POST["max-wins"]);
    setcookie("total-plays", 0);
    setcookie("wins1", 0);
    setcookie("wins2", 0);
    setcookie("final-win", "winner");
}
// Choice player 1
if (isset($_POST["submit"]) && isset($_POST["user-1"])) {
    setcookie("user-1", $_POST["user-1"]);
}
// Choice player 2
if (isset($_POST["submit"]) && isset($_POST["user-2"])) {
    setcookie("user-2", $_POST["user-2"]);
    setcookie("total-plays", $_COOKIE["total-plays"] + 1);
}
// Game Decision & next round
if (isset($_COOKIE["user-1"]) && isset($_COOKIE["user-2"])) {
    if ($_COOKIE["user-1"] == $_COOKIE["user-2"]) { } elseif ($_COOKIE["user-1"]  == "Rock" && $_COOKIE["user-2"] == "Scissors" || $_COOKIE["user-1"]  == "Scissors" && $_COOKIE["user-2"] == "Paper" || $_COOKIE["user-1"]  == "Paper" && $_COOKIE["user-2"] == "Rock") {
        setcookie("wins1", $_COOKIE["wins1"] + 1);
    } else {
        setcookie("wins2", $_COOKIE["wins2"] + 1);
    }
}
if (isset($_POST["play-again"])) {
    setcookie("user-1", $_COOKIE["user-1"], time() - 60);
    setcookie("user-2", $_COOKIE["user-2"], time() - 60);
}

// 3 Done, the winner is...
if ($_COOKIE["total-plays"] == $_COOKIE["max-wins"]) {
    if ($_COOKIE["wins1"] == $_COOKIE["wins2"]) {
        setcookie("final-win", "Winner");
    } elseif ($_COOKIE["wins1"] > $_COOKIE["wins2"]) {
        setcookie("final-win", "Speler 1 wint");
    } elseif ($_COOKIE["wins1"] < $_COOKIE["wins2"]) {
        setcookie("final-win", "Speler 2 wint");
    }
    if (isset($_POST["reset"])) {
        setcookie("max-wins", $_COOKIE["max-wins"], time() - 60);
        setcookie("total-plays", $_COOKIE["total-plays"], time() - 60);
        setcookie("user-1", $_COOKIE["user-1"], time() - 60);
        setcookie("user-2", $_COOKIE["user-2"], time() - 60);
        setcookie("wins1", $_COOKIE["wins1"], time() - 60);
        setcookie("wins2", $_COOKIE["wins2"], time() - 60);
        setcookie("final-win", $_COOKIE["final-win"], time() - 60);
    }
}
header("location:testgame.php");
