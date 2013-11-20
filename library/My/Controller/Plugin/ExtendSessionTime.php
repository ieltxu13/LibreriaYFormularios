<?php

class My_Controller_Plugin_ExtendSessionTime extends Zend_Controller_Plugin_Abstract
{
    public function preDispatch(Zend_Controller_Request_Abstract $request) {
        
        if(Zend_Auth::getInstance()->hasIdentity())
        {
        $seconds = 900;
        $session = new Zend_Session_Namespace('Zend_Auth');
        $session->setExpirationSeconds($seconds);
        }
    }
}

?>
