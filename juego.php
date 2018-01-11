<?php

$incognita = htmlspecialchars($_POST['incognita']);
$letra=isset($_POST['letra']) ? htmlspecialchars($_POST['letra']):'';
$letras=isset($_POST['letras']) ? ($_POST['letras']):array();
$letras[]=$letra;
?>
<h1>
<?php
for ($i = 0; $i < strlen($incognita); $i++) {
    $con=false;
    foreach ($letras as $letra) {
            if($incognita[$i]===$letra){
                echo $letra . "";
                $con=true;
            }
   	}
       if(!$con){
        echo ' _';
   } 
}
?>
</h1>


<form action="" method="post">
    <input type="hidden" name="incognita" value='<?php echo  $incognita ?>'/>
        <?php
            for ($j = 0; $j < count($letras); $j++) :
        ?>

            <input type="hidden" name="letras[<?php echo $j ?>]" value="<?php echo $letras[$j] ?>" />
            <?php echo $letras[$j] ?>
            <br>
        <?php
            endfor;
        ?>
    <label for="letra">Escriba una LETRA</label>
    <input type="text" name="letra" pattern="[A-Za-z]{1}" maxlength="1"/>
    <input type="submit" value="Enviar">
</form>
