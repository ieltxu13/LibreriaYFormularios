<?php

class Default_Model_Usuario
{
    const NOT_FOUND = 1;
    const WRONG_PW = 2;
    
    /**
     *
     * @var Bisna\Application\Container\DoctrineContainer
     */
    private static $_doctrineContainer;
    /**
     *
     * @var Doctrine\ORM\EntityManager
     */
    private static $_em;

    
    /**
     * 
     * @param string $username
     * @param string $password
     * @return My\Entity\Usuario
     * @throws Exception
     */
    public static function authenticate($username, $password) 
    {
        self::$_doctrineContainer = Zend_Registry::get('doctrine');
        self::$_em = self::$_doctrineContainer->getEntityManager();
        $query = self::$_em->createQuery("select u from My\Entity\Usuario u where u.usuario = ?1");
        $query->setParameter(1, $username);
        $result = $query->getResult();
        $user = $result[0];
        
        if($user)
        {
            if ($user->getClave() == $password)
                return $user;
                
                throw new Exception(self::WRONG_PW);                
        }
            throw new Exception(self::NOT_FOUND);
    }

}

