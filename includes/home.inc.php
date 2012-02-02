<?php
  require_once("classes/basket.class.php");            
  //maak een instantie van class Basket
  $mand = new Basket();
  $items = $mand->ophalenArtikels();
  
?>            
<article>
  <hgroup>
    <h1>Smartphones</h1>            
  </hgroup>  
  <?php
    if (isset($_POST['bestel']))
    {
      echo "bestelnummer : " . $_POST['id'];
      $item = $items[$_POST['id']];
      $mand->toevoegenAanMandje($item);
    }
  ?>  
  <table>
    <tr>
  <?php    
  
    foreach ($items as $telefoon)
    {      
      echo "<td><table><tr><td>" . $telefoon['omschrijving'] . "</td></tr>";
      echo "<tr><td><img src='images/" . $telefoon['afbeelding'] . "' /></td></tr>";
      echo "<tr><td>&euro; " . $telefoon['eenheidsprijs'] . "</td></tr>";
      echo "<tr><td><a href='basket.php?id=" . $telefoon['id'] . "'>Plaats in mandje</a>";
      echo "</tr></td></table></td>";        
    }          
    unset($mand);
  ?>      
    </tr>
  </table>  
</article>