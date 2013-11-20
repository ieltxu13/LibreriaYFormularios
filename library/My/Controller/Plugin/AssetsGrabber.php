<?php

class My_Controller_Plugin_AssetsGrabber extends Zend_Controller_Plugin_Abstract
{

    public function dispatchLoopStartup(Zend_Controller_Request_Abstract $request)
    {

        if ($request->getControllerName() != 'recursosn' && $request->getControllerName() != 'recursosg'
                && $request->getControllerName() != 'recursoss')
            return;

        switch ($request->getControllerName()) {
            case 'recursosn':
                $action = $request->getActionName();
                Header("Content-Type: image; charset=UTF-8");
                echo file_get_contents(APPLICATION_PATH . '/recursos/noticias/' . str_replace('+', ' ', $action));
                break;
            
            case 'recursoss':
                $action = $request->getActionName();
                Header("Content-Type: image; charset=UTF-8");
                echo file_get_contents(APPLICATION_PATH . '/recursos/secciones/' . str_replace('+', ' ', $action));
                break;
            
            case 'recursosg':
                
                $action = $request->getActionName();
                Header("Content-Type: image; charset=UTF-8");
                echo file_get_contents(APPLICATION_PATH . '/recursos/galeria/' . str_replace('+', ' ', $action));
                
        }
        exit;
    }

}
