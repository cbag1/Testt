<?php
    require_once 'fonction.php';
    $tabmots = [];
    $errors = [];
    $motsavecM = [];
    $nbrchamps = 0;
    $message = '';
    $mot = '';
    if (isset($_POST['valider'])) {
        $nbrchamps = $_POST['nbre'];
        if (is_empty($nbrchamps)) {
            $message = 'Champ obligatoire !';
        }else {
            if (!is_chaine_numeric($nbrchamps)) {
                $message = 'veuillez saisir un entier positif !';
                $nbrchamps = 0;
            }
        }
    }
    if (isset($_POST['resultat'])){
        $nbrchamps = $_POST['nbre'];
        for ($i=0;$i<$nbrchamps;$i++){
            $mot = $_POST['mot_'.($i)];
            var_dump($mot);
        }
        for ($i=0;$i<$nbrchamps;$i++) {
            echo $mot." ";
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Exemple</title>
    </head>
    <body>
       <form method="post">
           <label>Entrer le nombre de champs</label>
           <input type="text" autocomplete="off" name="nbre" value="<?= $nbrchamps ?>">
           <p style='color: red;'> <?= $message ?> </p>
           <input type="submit" name="valider"> <br>
           <?php for($i=0; $i < $nbrchamps; $i++) { ?>
           <label>Mot N°<?= $i+1 ?> :</label>
           <input type="text" autocomplete="off" name="mot_<?= $i ?>">
           <?php } ?>
           <?php if ($nbrchamps>0) { ?>
           <button type="submit" name="resultat">Résultats</button>
           <?php } ?>
       </form>
    </body>
</html>