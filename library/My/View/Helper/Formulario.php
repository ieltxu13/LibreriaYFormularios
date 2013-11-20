<?php

class My_View_Helper_Formulario extends Zend_View_Helper_Abstract{
    
    function formulario($modulo = 'Default', $nombre){
        
        $clase = $modulo.'_Form_'.$nombre.'Form';
        $form = new $clase();
        return $form;
    }
}

?>
