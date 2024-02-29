<!DOCTYPE html>
<html>
<head>
<title>Notre première instruction : echo</title>
<meta charset="utf-8" />
</head>
<body>
<h2>Affichage de texte avec PHP</h2>
<p>
Cette ligne a été écrite en HTML.<br />
<?php echo "Cette ligne a été écrite en PHP."; ?>
<p>Aujourd'hui nous sommes le <?php echo date('d/m/Y h:i:s'); ?>.</p>
</p>
</body>


</html>

<?php $nom = 'Shakespeare'; $nombre = 37;?>
<?php
echo "Je mappelle ";
echo $nom;
echo " et jai écrit ";
echo $nombre;
echo " pièces de théâtre";
?>
<?php echo "Je m'appelle $nom et j'ai écrit $nombre pièces de théâtre";?>
<?php echo 'Je mappelle ' . $nom . ' et jai écrit ' . $nombre . ' pièces de théâtre';?>

<?php $a=0; $b = '0'; ?>
<?php if($a===$b) echo "true";?>
<?php 
$couleurs[] = 'Blanc';
$couleurs[] = 'Bleu';
$couleurs[] = 'Noir';
$couleurs[] = 'Rouge';
$couleurs[] = 'Vert';
?>

<?php print_r($couleurs); ?>