<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Menu
 *
 * @author Ieltxu
 */
class My_View_Helper_MenuPrincipal extends Zend_View_Helper_Abstract
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
    
    public function menuPrincipal() {
        
        $seccionesEnSession = new Zend_Session_Namespace('secciones');
        if (isset($seccionesEnSession->secciones)) {
            $secciones = $seccionesEnSession->secciones;
        } else {
            $this->_doctrineContainer = Zend_Registry::get('doctrine');
            $this->_em = $this->_doctrineContainer->getEntityManager();
            $query = $this->_em->createQuery('SELECT n FROM My\Entity\Seccion n where n.ubicacion = ?1');
            $query->setParameter(1, 'centro');
            $secciones = $query->getResult();
            
            $session = new Zend_Session_Namespace('secciones');
            $session->secciones = $secciones;
        }
        $menues = '';
        foreach ($secciones as $seccion)
        {
            $menues .= '<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">'.$seccion->getNombre().'</a><ul class="dropdown-menu">';
            if($seccion->getSubSecciones()->count() != 0){
                foreach($seccion->getSubSecciones() as $subseccion) {
                    $menues .= '<li><a href="/public/secciones/ver/id/'.$subseccion->getId().'">'.$subseccion->getNombre().'</a></li>';
                    //$menues .= '<li><a href="/PaginaLavalle/public/secciones/ver/id/'.$subseccion->getId().'">'.$subseccion->getNombre().'</a></li>';
                }
                
            }
            $menues .= '</ul></li>';
        }
 
        return $menues; 
}
}

?>
