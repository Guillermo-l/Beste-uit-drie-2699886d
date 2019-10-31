<!DOCTYPE html>

<html>

<head>
    <title>RPS</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet" style="text/css">
</head>

<body>
    <h1>Steen Papier schaar</h1>
    <div class="all-content">

        <?php if (!isset($_COOKIE["max-wins"])) { ?>
            <div>
                <form class="set-wins" name="max-wins" method="post" action="test.php">
                    <div>
                        <label for="max-wins">Hoeveel rondes wil je spelen? </label>
                        <input type="number" name="max-wins" min="2" max="5" required>
                    </div>
                    <div>
                        <input type="submit" class="btn btn-outline-warning" id="submit" name="submit" value="Start">
                    </div>
                </form>
            </div>
        <?php } ?>

        <div>
            <p class="speler">Speler 1:
                <?php
                if (isset($_COOKIE["user-1"]) && isset($_COOKIE["user-2"])) {
                    echo $_COOKIE["user-1"];
                }
                ?>
            </p>

            <?php if (isset($_COOKIE["max-wins"]) && !isset($_COOKIE["user-1"])) { ?>
                <div>
                    <form class="form" name="user-1" method="post" action="test.php">
                        <div>
                            <div class="radio-div">
                                <div><input type="radio" name="user-1" value="Rock" id="Rock"><label for="Rock"><img src="./img/rock.png" alt="Rock" /></div>
                                <div><input type="radio" name="user-1" value="Paper" id="Paper"><label for="Paper"><img src="./img/paper.png" alt="Paper" /></div>
                                <div><input type="radio" name="user-1" value="Scissors" id="Scissors"><label for="Scissors"><img src="./img/scissors.png" alt="Scissors" /></div>
                            </div>
                        </div>
                        <div class="submit-button"><input type="submit" class="btn btn-outline-secondary" id="submit" name="submit" value="Submit"></div>
                    </form>
                </div>
            <?php } ?>

        </div>

        <div>
            <p class="speler">Speler 2:
                <?php
                if (isset($_COOKIE["user-1"]) && isset($_COOKIE["user-2"])) {
                    echo $_COOKIE["user-2"];
                }
                ?>
            </p>

            <?php if (isset($_COOKIE["user-1"]) && !isset($_COOKIE["user-2"])) { ?>
                <div>
                    <form class="form" name="user-2" method="post" action="test.php">
                        <div>
                            <div class="radio-div">
                                <div><input type="radio" name="user-2" value="Rock" id="Rock"><label for="Rock"><img src="./img/rock.png" alt="Rock" /></div>
                                <div><input type="radio" name="user-2" value="Paper" id="Paper"><label for="Paper"><img src="./img/paper.png" alt="Paper" /></div>
                                <div><input type="radio" name="user-2" value="Scissors" id="Scissors"><label for="Scissors"><img src="./img/scissors.png" alt="Scissors" /></div>
                            </div>
                        </div>
                        <div class="submit-button"><input type="submit" class="btn btn-outline-secondary" id="submit" name="submit" value="Submit"></div>
                    </form>
                </div>
            <?php } ?>

        </div>

        <div>
            <p class="outcome">
                <?php if(isset($_COOKIE["total-plays"]) && isset($_COOKIE["max-wins"]) && $_COOKIE["total-plays"] == $_COOKIE["max-wins"]) {
                    echo $_COOKIE["final-win"];
                }
                ?>
            </p>
        </div>


        <?php if (isset($_COOKIE["user-1"]) && isset($_COOKIE["user-2"]) && $_COOKIE["max-wins"] !== $_COOKIE["total-plays"]) { ?>
            <div class="play-again">
                <form name="play-again" method="post" action="test.php">
                    <input type="submit" class="btn btn-outline-success" id="submit" name="play-again" value="Volgende Ronde">
                </form>
            </div>
        <?php } ?>

        <?php if (isset($_COOKIE["max-wins"]) && isset($_COOKIE["total-plays"]) && $_COOKIE["max-wins"] == $_COOKIE["total-plays"]) { ?>
            <div class="reset">
                <form name="reset" method="post" action="test.php">
                    <input type="submit" class="btn btn-outline-danger" id="submit" name="reset" value="Reset">
                </form>
            </div>
        <?php } ?>


    </div>
</body>

</html>