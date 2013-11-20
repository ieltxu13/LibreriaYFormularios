<?php

 /**
 *
 * @author Ieltxu
 */
class My_Auth_Adapter implements Zend_Auth_Adapter_Interface{

    const NOT_FOUND_MSG = 'No se encontró el usuario';
    const BAD_PW_MSG = 'Contraseña Incorrecta';
    /**
     *
     * @var My\Entity\User
     */
    protected $user = null;
    /**
     *
     * @var string
     */
    protected $username = "";
    /**
     *
     * @var string
     */
    protected $password = "";
    
    
    public function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;
    }
    
    /**
     * @throws Zend_Auth_Adapter_Exception If authentication cannot be performed
     * @return Zend_Auth_Result
     */
    public function authenticate() 
    {
        try{
            $this->user = Default_Model_Usuario::authenticate($this->username, $this->password);
        } catch (Exception $e) {
            if($e->getMessage() == Default_Model_Usuario::NOT_FOUND)
                return $this->createResult(Zend_Auth_Result::FAILURE_IDENTITY_NOT_FOUND, array(self::NOT_FOUND_MSG));
            if($e->getMessage() == Default_Model_Usuario::WRONG_PW)         
                return $this->createResult(Zend_Auth_Result::FAILURE_CREDENTIAL_INVALID, array(self::BAD_PW_MSG));
        }
        
        return $this->createResult(Zend_Auth_Result::SUCCESS);
    }    
    
    private function createResult($code, $messages = array())
    {
        return new Zend_Auth_Result($code, $this->user, $messages);
        
    }
}
