<?php

class My_Controller_Plugin_SeccionesCheck extends Zend_Controller_Plugin_Abstract
{

    public function __construct()
    {
        
    }

    public function preDispatch(Zend_Controller_Request_Abstract $request)
    {
        $resource = $request->getControllerName();
        $action = $request->getActionName();
        $id = $request->getParam('id');
        if ($resource == 'secciones' && $action == 'ver') {

            switch ($id) {
                case 18:
                    $request->setControllerName('noticias');
                    $request->setActionName('todas');
                    if ($request->getParam('pagina')) {
                        $pagina = $request->getParam('pagina');
                        //$request->setParam('pagina', $request->getParam('pagina'));
                    } else {
                        $pagina = 1;
                    }
                    $request->setParam('pagina', $pagina);

                    break;
                case 4:

                    $request->setControllerName('secciones');
                    $request->setActionName('galeria');

                    break;
                
                case 15:

                    $request->setControllerName('licitaciones');
                    $request->setActionName('index');

                    break;
                
                case 16:

                    $request->setControllerName('mensajes');
                    $request->setActionName('nuevo-mensaje');

                    break;
                
                case 17:

                    $request->setControllerName('secciones');
                    $request->setActionName('novedades');

                    break;
                
                default:
                    break;
            }
        }
    }

}
