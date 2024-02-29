<?php
session_start();
// session_destroy();
$equipes  = [
    "1" => [
        "nomequipe" => "WAC",
        "logo" => "images/wac.png",
        "joueurs" => [
            [
                "numero" => 1,
                "nom" => "jbran",
                "photo" => "images/players/jbran.jpg"
            ],
            [
                "numero" => 2,
                "nom" => "Alamloud",
                "photo" => "images/players/amloud.png"
            ],
            [
                "numero" => 3,
                "nom" => "Kaabi",
                "photo" => "images/players/kaabi.jpg"
            ],
            [
                "numero" => 4,
                "nom" => "ATTIAT ALLAh",
                "photo" => "images/players/yahya.jpg"
            ],
        ]
    ],
    "2" => [
        "nomequipe" => "RMD",
        "logo" => "images/rmd.jpg",
        "joueurs" => [
            [
                "numero" => 1,
                "nom" => "Bellingham",
                "photo" => "images/players/belli.jpg"
            ],
            [
                "numero" => 2,
                "nom" => "Vinicus",
                "photo" => "images/players/vini.jpg"
            ],
            [
                "numero" => 3,
                "nom" => "valverde",
                "photo" => "images/players/vidi.jpg"
            ],
            [
                "numero" => 4,
                "nom" => "modric",
                "photo" => "images/players/modric.jpg"
            ]
        ]
    ]
];

$_SESSION['equipes'] = $equipes;

if (isset($_POST['date'])) {
    $match = [$_POST['equipe_1'], $_POST['equipe_2'], $_POST['date']];
    $_SESSION['match'] = $match;
}



if (isset($_POST['selected'])) {
    $_SESSION['selected'] = $_POST['selected'];
    $players =  [];
    foreach ($equipes as $equipe) {
        if ($equipe['nomequipe'] == $_POST['selected']) {
            foreach ($equipe['joueurs'] as $player) {
                $players[] = $player['nom'];
            }
        }
    }
}

if (isset($_POST['player'])) {
    $newgoal = ['joueurs' => $_POST['player'], "equipe" => $_SESSION['selected'], "time" => $_POST['minutes']];
   if(!isset( $_SESSION['goals'])){
    $_SESSION['goals'] = [];
    $_SESSION['goals'][] = $newgoal;
   }
   else {
    $_SESSION['goals'][] = $newgoal;
   }
}



?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="container">
    <h1>Gestion Des matches</h1>

    <div class="row">

        <form class="equipes col" method="post">

            <div class="form-group col">
                <label for="equipe_1" class="my-1">Equipe 1: </label>
                <select class="form-control" id="equipe_1" name="equipe_1" required>
                    <?php foreach ($equipes as $key => $value) { ?>

                        <option value="<?= $value["nomequipe"] ?>"><?= $value["nomequipe"] ?></option>
                    <?php } ?>

                </select>
            </div>

            <div class="form-group col">
                <label for="equipe_2" class="my-1">Equipe 2: </label>
                <select class="form-control" id="equipe_2" name="equipe_2" required>
                    <?php foreach ($equipes as $key => $value) { ?>

                        <option value="<?= $value["nomequipe"] ?>"><?= $value["nomequipe"] ?></option>
                    <?php } ?>

                </select>
            </div>

            <div class="form-group col">
                <label for="date" class="my-1">Date:</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>
            <input type="submit" class="btn btn-info w-100 mt-3" name="match" value="AJOUTER MATCH">
        </form>
        <!-- __________________________________________________________ -->
        <div class="col">
        <form  method="post">
        <div class="form-group ">
                <label for="equipe" class="my-1">Equipe: </label>
                <select class="form-control" id="equipe" name="selected" onchange="this.form.submit()" <?php if(!isset($_SESSION['match'])) {echo 'disabled';}?>>
                
                <?php if(!isset($_SESSION['match'])) {echo '<option>planifier un match svp</option>';}?>

                <?php for ($i = 0; $i < 2; $i++) { ?>

                        <option value="<?= $_SESSION['match'][$i] ?>"><?= $_SESSION['match'][$i] ?></option>
                    <?php } ?>

                </select>
            </div>

        </form> 
        <form class="" method="post">
            <div class="form-group col">
                <label for="player" class="my-1">Joueur: </label>
                <select class="form-control" id="player" name="player" <?php if(!isset($_SESSION['match'])) {echo 'disabled';}?>>

                    <?php foreach ($players as $key => $value) { ?>
                        <option value="<?= $value ?>"> <?= $value ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group col">
                <label for="minutes" class="my-1">minutes:</label>
                <input type="number" class="form-control" id="minutes" name="minutes" <?php if(!isset($_SESSION['match'])) {echo 'disabled';}?>>
            </div>
            <input type="submit" class="btn btn-primary w-100 mt-3"  value="AJOUTER GOAL" <?php if(!isset($_SESSION['match'])) {echo 'disabled';}?>>
        </form>
        </div>
        <div class="my-2"></div>
        <hr />

    </div>

    <?php if (isset($_SESSION['goals']) && count($_SESSION['goals']) > 0) { ?>
        <table class="table">
  <thead>
    <h1>list des butes</h1>
    <tr>
      <th scope="col">#</th>
      <th scope="col">minut</th>
      <th scope="col">Equipe</th>
      <th scope="col">Joueur</th>
    </tr>
  </thead>
  <tbody>
       <?php foreach($_SESSION['goals'] as $goal => $value ){?>


    <tr>
      <th scope="row"><?= $goal+1 ?></th>
      <td><?= $value['time'] ?></td>
      <td><?= $value['equipe'] ?></td>
      <td><?= $value['joueurs'] ?></td>
    </tr>




        <?php }?>
        </tbody>
</table>
    <?php } else { ?>
        <div class="alert alert-danger" role="alert">
           acune but jusqua maintenant
        </div>

    <?php } ?>



    <a href="players.php" > list des joueurs </a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>