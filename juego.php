<?php

$incognita = htmlspecialchars($_POST['incognita']);
$letra=isset($_POST['letra']) ? htmlspecialchars($_POST['letra']) : '';

$vidas=isset($_POST['vidas']) ? (int)($_POST['vidas']) : 7;

$letras=isset($_POST['letras']) ? ($_POST['letras']) : array();

if(preg_match("%[a-z]%", $letra) && !in_array($letra, $letras)){
    $letras[]=$letra;       
}

?>
<h1>
<?php
$ganar=0;
$hasEcertado=false;
for ($i = 0; $i < strlen($incognita); $i++) {
    $con=false;
    foreach ($letras as $letra) {
            if($incognita[$i]===$letra){
                echo $letra . "";
                $con=true;
                $ganar++;
                if($letra == $letras[count($letras)-1])
                    $hasEcertado=true;
            }
   	}
       if(!$con){
        echo ' _';
   } 
}
if(!$hasEcertado){
    $vidas--;
    // echo ($vidas) . '<br />';
}
?>

</h1>

<?php
if($ganar==strlen($incognita)) : 
?>   
   <h2>Has Ganado¡¡¡¡</h2> 
    <a href="index.html">Intentalo Otra Vez</a>
<?php
    elseif($vidas===0) :
?>
    <h2>Has Perdido¡¡¡¡</h2> 
    <a href="index.html">Intentalo Otra Vez</a>
<?php
    else :
?>  
<form action="" method="post">
    <input type="hidden" name="incognita" value='<?php echo  $incognita ?>'/>
    <input type="hidden" name="vidas" value='<?php echo  $vidas ?>'/>
        <?php
            for ($j = 0; $j < count($letras); $j++) :
        ?>

            <input type="hidden" name="letras[<?php echo $j ?>]" value="<?php echo $letras[$j] ?>" />
            <?php echo $letras[$j] ?>
            
        <?php
            endfor;
        ?>
        <br>
    <label for="letra">Escriba una LETRA</label>
    <select name="letra">
        <?php
            for ($j = ord('a'); $j < ord('z'); $j++) :
        ?>
            <option value="<?php echo chr($j) ?>"><?php echo chr($j) ?></option>
        <?php
            endfor;
        ?>
    </select>
    
    <input type="submit" value="Enviar">
</form>
<?php
    endif;
?>