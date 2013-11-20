<?php

class My_View_Helper_SeccionCostado extends Zend_View_Helper_Abstract
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

    public function seccionCostado($index, $color, $ubicacion)
    {
        $seccionesEnSession = new Zend_Session_Namespace('secciones');
        switch ($ubicacion) {
            case 'izquierda':
                if (isset($seccionesEnSession->seccionesIzq)) {
                    $secciones = $seccionesEnSession->seccionesIzq;
                } else {
                    $this->_doctrineContainer = Zend_Registry::get('doctrine');
                    $this->_em = $this->_doctrineContainer->getEntityManager();
                    $query = $this->_em->createQuery('SELECT n FROM My\Entity\Seccion n where n.ubicacion = ?1');
                    $query->setParameter(1, 'izquierda');
                    $secciones = $query->getResult();


                    $session = new Zend_Session_Namespace('secciones');
                    $session->seccionesIzq = $secciones;
                }

                $menues = '';

                $menues .= '   <ul class="nav nav-tabs nav-stacked ' . $color . '">';
                $menues .= '       <li class="titulo' . ucfirst($color) . '"><a href="">' . $seccionesEnSession->seccionesIzq[$index]->getNombre() . '</a></li>';
                foreach ($seccionesEnSession->seccionesIzq[$index]->getSubSecciones() as $subseccion)
                {
                    //$menues .= '       <li><a href="/PaginaLavalle/public/secciones/ver/id/' . $subseccion->getId() . '">' . $subseccion->getNombre() . '</a></li>';
                    if(!$subseccion->getNombre() === 'Foro Huanacache') {
                    $menues .= '       <li><a href="/public/secciones/ver/id/' . $subseccion->getId() . '">' . $subseccion->getNombre() . '</a></li>';
                    } else {
                    $menues .= '       <li><a href="'. strip_tags($subseccion->getContenido()) . '">' . $subseccion->getNombre() . '</a></li>';   
                    }
                }
                $menues .='    </ul>';

                return $menues;
                break;
            case 'derecha':
                if (isset($seccionesEnSession->seccionesDer)) {
                    $secciones = $seccionesEnSession->seccionesDer;
                } else {
                    $this->_doctrineContainer = Zend_Registry::get('doctrine');
                    $this->_em = $this->_doctrineContainer->getEntityManager();
                    $query = $this->_em->createQuery('SELECT n FROM My\Entity\Seccion n where n.ubicacion = ?1');
                    $query->setParameter(1, 'derecha');
                    $secciones = $query->getResult();

                    $session = new Zend_Session_Namespace('secciones');
                    $session->seccionesDer = $secciones;
                }

                $menues = '';

                $menues .= '   <ul class="nav nav-tabs nav-stacked ' . $color . '">';
                $menues .= '       <li class="titulo' . ucfirst($color) . '"><a href="">' . $seccionesEnSession->seccionesDer[$index]->getNombre() . '</a></li>';

                //Comportamiento distinto para la sección de links ***
                if ($seccionesEnSession->seccionesDer[$index]->getNombre() == 'LINKS') {
                    foreach ($seccionesEnSession->seccionesDer[$index]->getSubSecciones() as $subseccion)
                    {
                        //$menues .= '       <li><a href="'. $subseccion->getContenido() . '">' . $subseccion->getNombre() . '</a></li>';
                        $menues .= '       <li><a href="'. strip_tags($subseccion->getContenido()) . '">' . $subseccion->getNombre() . '</a></li>';
                    }
                } else {

                    //***
                    foreach ($seccionesEnSession->seccionesDer[$index]->getSubSecciones() as $subseccion)
                    {
                        //$menues .= '       <li><a href="/PaginaLavalle/public/secciones/ver/id/' . $subseccion->getId() . '">' . $subseccion->getNombre() . '</a></li>';
                        $menues .= '       <li><a href="/public/secciones/ver/id/' . $subseccion->getId() . '">' . $subseccion->getNombre() . '</a></li>';
                    }
                }
                $menues .='    </ul>';

                return $menues;
                break;
            default:
                break;
        }
    }

}
