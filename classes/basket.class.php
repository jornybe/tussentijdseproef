<?php
  session_start();

  class Basket 
  {
    public $artikelomschrijving = "";
    public $aantal = 0;
    public $eenheidsprijs = 0;
    public $mand = array();

    function __construct()
    {
      $_SESSION['mand'] = $this->mand;  
    }        
    function ophalenArtikels()
    {
      $artikels[1] = array ( "id" => "1", "omschrijving" => "blackberry curve", "eenheidsprijs" => "150,00", "afbeelding" => "blackberry.jpg");
      $artikels[2] = array ( "id" => "2", "omschrijving" => "samsung galaxy s", "eenheidsprijs" => "450,00", "afbeelding" => "samsung.jpg");
      $artikels[3] = array ( "id" => "3", "omschrijving" => "sony ericsson xperia", "eenheidsprijs" => "300,00", "afbeelding" => "sony.jpg");
      
      
      return $artikels;
    }
    function toevoegenAanMandje($item)
    {
      foreach ($_SESSION['mand'] as $key => $value)
      {
        if ($_SESSION['mand'][$key]['id'] == $item['id'])
        {
          $_SESSION['mand'][$key]['aantal'] += $items['aantal'];
          return;
        }
      }                                    
      $_SESSION['mand'][] = $item;
    }                
    public function mandWeergeven()
    {
      return $_SESSION['mand'];
    }        
        
    public function mandLeegmaken()
    {
      $_SESSION['mand'] = array();
      session_destroy();
    }
  }
?>