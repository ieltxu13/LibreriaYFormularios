<?php

/**
 * Description of Proyecto
 *
 * @author root
 */
namespace My\Entity;

/**
 * @Entity
 */ 
class Proyecto {
    
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
     * @var date
     * @Column (type="date",nullable="true")
     */
    protected $inicio;
    
    /**
     *
     * @var date
     * @Column (type="date",nullable="true")
     */
    protected $fin;
    
    /**
     * @OneToOne(targetEntity="Proyecto", mappedBy="customer")
     */
    protected $prototipo;
    
    /**
     *
     * @var date
     * @Column (type="date",nullable="true")
     */
    protected $fechaLanzamiento;
    
    /**
     *
     * @ManyToOne(targetEntity="Cliente", inversedBy="proyectos")
     */
    protected $cliente;
    
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
        $this->fecha = new \DateTime(date('Y-m-d H:i:s'));
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
    
    public function getInicio() {
        return date_format($this->inicio, 'Y-m-d');
    }
    
    public function setInicio($fecha) {
        $this->inicio = new \DateTime($fecha);
    }
    
    public function getFin() {
        return date_format($this->fin, 'Y-m-d');
    }
    
    public function setFin($fecha) {
        $this->fin = new \DateTime($fecha);
    }
    
    public function getFechaLanzamiento() {
        return date_format($this->fechaLanzamiento, 'Y-m-d');
    }
    
    public function setFechaLanzamiento($fecha) {
        $this->fechaLanzamiento = new \DateTime($fecha);
    }
    
    public function getCliente() {
        return $this->cliente;
    }
    
    public function setCliente(Cliente $cliente) {
        $this->cliente = $cliente;
    }
    
    public function getPrototipo() {
        return $this->prototipo;
    }
    
    public function setPrototipo(Prototipo $prototipo) {
        $this->prototipo = $prototipo;
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
