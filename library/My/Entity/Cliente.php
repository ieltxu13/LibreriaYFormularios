<?php

/**
 * Description of Cliente
 *
 * @author root
 */

namespace My\Entity;

/**
 * @Entity
 */ 
class Cliente {
    
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
    protected $email;
    
    /**
     *
     * @var string
     * @Column(type="string", length=255)
     */
    protected $telefonos;
    
    /**
     *
     * @var string
     * @Column(type="string", length=255)
     */
    protected $sitio;
    
    /**
     *
     * @var string
     * @Column(type="text")
     */
    protected $otros;
    
    /**
     *
     * @OneToMany(targetEntity="Proyecto", mappedBy="cliente")
     */
    protected $proyectos;
    
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
    
    public function __construct() {
        $this->creado = new \DateTime(date('Y-m-d H:i:s'));
        $this->proyectos = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    public function getId(){
        return $this->id;
    }
    
    public function getNombre() {
        return $this->nombre;
    }
    
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    
    public function getEmail() {
        return $this->email;
    }
    
    public function setEmail($email) {
        $this->email = $email;
    }
    
    public function getTelefonos() {
        return $this->telefonos;
    }
    
    public function setTelefonos($telefonos) {
        $this->telefonos = $telefonos;
    }
    
    public function getSitio() {
        return $this->sitio;
    }
    
    public function setSitio($sitio) {
        $this->sitio = $sitio;
    }
    
    public function getOtros() {
        return $this->otros;
    }
    
    public function setOtros($otros) {
        $this->otros = $otros;
    }
    
    public function getProyectos() {
        return $this->proyectos;
    }
    
    public function agregarProyecto(Proyecto $proyecto) {
        $this->proyectos[] = $proyecto;
    }
    
    public function quitarProyecto(Proyecto $proyecto) {
        $this->proyectos->removeElement($proyecto);
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
