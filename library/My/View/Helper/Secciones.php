<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Secciones
 *
 * @author Ieltxu
 */
class My_View_Helper_Secciones extends Zend_View_Helper_Abstract
{

    /**
     * @var Bisna\Application\Container\DoctrineContainer
     *
     */
    protected $_doctrineContainer = null;

    /**
     * @var Doctrine\ORM\EntityManager
     *
     */
    protected $_em = null;

    function secciones()
    {
        $seccionesEnSession = new Zend_Session_Namespace('secciones');
        if (isset($seccionesEnSession->secciones)) {
            $secciones = $seccionesEnSession->secciones;
        } else {
            $this->_doctrineContainer = Zend_Registry::get('doctrine');
            $this->_em = $this->_doctrineContainer->getEntityManager();
            $query = $this->_em->createQuery('SELECT n FROM My\Entity\Seccion n');
            $secciones = $query->getResult();
            
            $session = new Zend_Session_Namespace('secciones');
            $session->secciones = $secciones;
        }
        $menues = '';
        
        foreach ($secciones as $seccion)
        {
            $menues .= '<li class="dropdown-submenu"><a href="#">'.$seccion->getNombre().'</a><ul class="dropdown-menu">';
            if($seccion->getSubSecciones()->count() != 0){
                foreach($seccion->getSubSecciones() as $subseccion) {
                    $menues .= '<li><a href="/public/administracion/ver/'.$subseccion->getId().'">'.$subseccion->getNombre().'</a></li>';
                }
                
            }
            $menues .= '</ul></li>';
        }
        
        return $menues; 
        }
    

}

?>
