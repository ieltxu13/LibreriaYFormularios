<?php

/**
 * Description of Acl
 *
 * @author Ieltxu Algañarás (ieltxu.alganaras@gmail.com)
 */

class Application_Model_Acl extends Zend_Acl
{
    
    public function __construct()
    {
        $this->addRole(new Zend_Acl_Role('invitado'));
        $this->addRole(new Zend_Acl_Role('usuario'),'invitado');
        
        $this->addResource(new Zend_Acl_Resource('default'))
             ->addResource(new Zend_Acl_Resource('default:index'),'default')
             ->addResource(new Zend_Acl_Resource('default:error'),'default');
        
        $this->addResource(new Zend_Acl_Resource('administracion'))
             ->addResource(new Zend_Acl_Resource('administracion:index'),'administracion');
        
        $this->allow('invitado', 'default:index','login')
             ->allow('invitado', 'default:error','error');
        
        $this
             ->allow('usuario','default:index',array('index', 'salir'))
             ->deny('usuario','default:index',array('login'));
        
    }
}
