<?php
//CONSULTAR ORGANO JURISDICCIONAL 04/08/2021
  function GetLista(){
   require_once "../../clases/SettingPDO.php";
   
    $sql = "SELECT * FROM CAT_ORG_JURIS";
   $resultado = $con->prepare($sql);
   $resultado->execute();
   $listas = '<option selected value="" disabled="disabled">Organo Jurisdiccional</option>';
   
   while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
       $listas .= "<option value=$row[ID_ORGJURIS]>$row[NOM_ORGJURIS]</option>";
    }
      return $listas;
  } 
   echo GetLista();
   exit();

