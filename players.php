<?php
session_start();
if(isset($_POST['equipe'])){
    $selected = $_POST['equipe'];
    $joueurs =  [];
    foreach ($_SESSION['equipes'] as $equipe) {
       if ($equipe['nomequipe']== $_POST['equipe']){
        foreach ($equipe['joueurs'] as $player) {
            $joueurs[] = $player;
        }
       }
    }
    $_SESSION['joueurs'] = $joueurs;
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .playerphoto{
        width:200px !important;
        }
    </style>
</head>

<body class="container">
    <h1>list des joueurs</h1>


    <form class="col" method="post">
    <div class="form-group col">
            <label for="equipe_2" class="my-1">Equipe: </label>
            <select class="form-control" id="equipe" name="equipe" required onchange="this.form.submit()">
            <option></option>
                <?php foreach($_SESSION['equipes'] as $key=>$value){?>

                    <option value="<?= $value["nomequipe"]?>"><?= $value["nomequipe"]?></option>
            <?php } ?>
               
            </select>
        </div>
    </form>

    <div class="row">
        <?php foreach ($_SESSION['joueurs'] as $joueur) { ?>
            <div class="col">
                <div class="name"><?= $joueur['nom'] ?></div>
                <img class="playerphoto" src="<?= $joueur['photo'] ?>" alt="">
    </div>
        <?php } ?>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

