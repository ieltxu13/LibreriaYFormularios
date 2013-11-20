<?php

class Default_IndexController extends Zend_Controller_Action
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

    public function init()
    {
        $this->_doctrineContainer = Zend_Registry::get('doctrine');
        $this->_em = $this->_doctrineContainer->getEntityManager();
    }

    public function indexAction()
    {
        // action body
    }

    public function loginAction()
    {
        $form = new Default_Form_LoginForm();

        $this->view->form = $form;

        if ($this->getRequest()->isPost()) {

            $data = $this->getRequest()->getPost();
            if ($form->isValid($data)) {

                $usuario = $form->getValue('usuario');
                $clave = $form->getValue('clave');

                $authAdapter = new My_Auth_Adapter($usuario, $clave);
                $result = Zend_Auth::getInstance()->authenticate($authAdapter);
                
                if (Zend_Auth::getInstance()->hasIdentity()) {    
                $usuario = $this->_em->find('My\Entity\Usuario',Zend_Auth::getInstance()->getIdentity()->getId());
                $usuario->setUltimoAcceso();
                $this->_em->flush();
                
                
                    $this->_helper->redirector('index','informes');
                } else {
                    $this->view->message = implode('  ', $result->getMessages());
                }
            }
            $this->view->errors = $form->getErrorMessages();
        }
    }

    public function salirAction()
    {
        // action body
    }


}





