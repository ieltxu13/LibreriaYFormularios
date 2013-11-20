<?php

namespace My\Entity;

/**
 * Description of Usuario
 *
 * @author Ieltxu
 */

/**
 * @Entity
 */
class Usuario
{
    
    /**
     * @var integer 
     * @Column (type="integer")
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    protected $id;
    
    /**
     *
     * @var string
     * @Column(type="string", length=255)
     */
    protected $nombre;
    
    /**
     *
     * @var string
     * @Column(type="string", length=255)
     */
    protected $apellido;
    
    /**
     *
     * @var string
     * @Column(type="string", length=255)
     */
    protected $usuario;
    
    /**
     *
     * @var string
     * @Column(type="string", length=255)
     */
    protected $clave;
    
    /**
     *
     * @var string
     * @Column(type="string", length=255)
     */
    protected $rol;
    
    /**
     * @Column(type="datetime", nullable=true)
     * @Timestamp
     */
    protected $ultimoAcceso;
    
    /**
     * @Column(type="datetime", nullable=false)
     * @Timestamp
     */
    protected $creado;
    
    /**
     * @Column(type="datetime", nullable=true)
     * @Timestamp
     */
    protected $modificado;
    
    public function setId($id) {
        $this->id = $id;
    }
    
    public function getId() {
        return $this->id;
    }
    
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    
    public function getNombre() {
        return $this->nombre;
    }
    
    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }
    
    public function getApellido() {
        return $this->apellido;
    }
    
    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }
    
    public function getUsuario() {
        return $this->usuario;
    }
    
    public function setClave($clave) {
        $this->clave = $clave;
    }
    
    public function getClave() {
        return $this->clave;
    }
    
    public function setRol($rol) {
        $this->rol = $rol;
    }
    
    public function getRol() {
        return $this->rol;
    }
    
    public function getUltimoAcceso(){
        return date_format($this->ultimoAcceso, 'Y-m-d H:i:s');
    }
    
    public function setUltimoAcceso(){
        $this->ultimoAcceso = new \DateTime(date('Y-m-d H:i:s'));
    }
    
    public function getCreado(){
        return date_format($this->creado, 'Y-m-d H:i:s');
    }
    
    public function setCreado($fecha){
        $this->creado = new \DateTime($fecha);
    }
    
    public function getModificado(){
        return date_format($this->modificado, 'Y-m-d H:i:s');
    }
    
    public function setModificado($fecha){
        $this->modificado = new \DateTime($fecha);
    }
    
    
}

