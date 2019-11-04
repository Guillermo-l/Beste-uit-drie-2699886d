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

        <?php if (!isset($_COOKIE["maxplays"])) { ?>
            <div>
                <form class="set-wins" name="maxplays" method="post" action="handler.php">
                    <div>
                        <label for="maxplays">Hoeveel rondes wil je spelen? </label>
                        <input type="number" name="maxplays" min="1" max="5" required>
                    </div>
                    <div>
                        <input type="submit" class="btn btn-outline-warning" id="submit" name="submit-maxplays" value="Start">
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

            <?php if (isset($_COOKIE["maxplays"]) && !isset($_COOKIE["user-1"])) { ?>
                <div>
                    <form class="form" name="user-1" method="post" action="handler.php">
                        <div>
                            <div class="radio-div">
                                <div><input type="radio" name="user-1" value="Rock" id="Rock"><label for="Rock"><img src="./img/rock.png" alt="Rock" /></div>
                                <div><input type="radio" name="user-1" value="Paper" id="Paper"><label for="Paper"><img src="./img/paper.png" alt="Paper" /></div>
                                <div><input type="radio" name="user-1" value="Scissors" id="Scissors"><label for="Scissors"><img src="./img/scissors.png" alt="Scissors" /></div>
                            </div>
                        </div>
                        <div class="submit-button"><input type="submit" class="btn btn-outline-secondary" id="submit" name="submit-1" value="Submit"></div>
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
                    <form class="form" name="user-2" method="post" action="handler.php">
                        <div>
                            <div class="radio-div">
                                <div><input type="radio" name="user-2" value="Rock" id="Rock"><label for="Rock"><img src="./img/rock.png" alt="Rock" /></div>
                                <div><input type="radio" name="user-2" value="Paper" id="Paper"><label for="Paper"><img src="./img/paper.png" alt="Paper" /></div>
                                <div><input type="radio" name="user-2" value="Scissors" id="Scissors"><label for="Scissors"><img src="./img/scissors.png" alt="Scissors" /></div>
                            </div>
                        </div>
                        <div class="submit-button"><input type="submit" class="btn btn-outline-secondary" id="submit" name="submit-2" value="Submit"></div>
                    </form>
                </div>
            <?php } ?>

        </div>

        <div>
            <p class="outcome">
                <?php if(isset($_COOKIE["totalplays"]) && isset($_COOKIE["maxplays"]) && isset($_COOKIE["maxplays"]) && $_COOKIE["totalplays"] == $_COOKIE["maxplays"]) {
                    echo $_COOKIE["final-win"];
                }
                ?>
            </p>
        </div>


        <?php if (isset($_COOKIE["user-1"]) && isset($_COOKIE["user-2"]) && $_COOKIE["maxplays"] !== $_COOKIE["totalplays"]) { ?>
            <div class="play-again">
                <form name="play-again" method="post" action="handler.php">
                    <input type="submit" class="btn btn-outline-success" id="submit" name="play-again" value="Volgende Ronde">
                </form>
            </div>
        <?php } ?>

        <?php if(isset($_COOKIE["maxplays"]) && isset($_COOKIE["totalplays"]) && isset($_COOKIE["totalplays"]) && $_COOKIE["maxplays"] == $_COOKIE["totalplays"]) { ?>
            <div class="reset">
                <form name="reset" method="post" action="handler.php">
                    <input type="submit" class="btn btn-outline-danger" id="submit" name="reset" value="Reset">
                </form>
            </div>
        <?php } ?>


    </div>
</body>

</html>