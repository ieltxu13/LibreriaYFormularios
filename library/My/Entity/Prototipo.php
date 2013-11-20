<?php

/**
 * Description of Prototipo
 *
 * @author root
 */
namespace My\Entity;

/**
 * @Entity
 */ 
class Prototipo {
    
    /**
     * @var integer 
     * @Column (type="integer")
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    protected $id;
    
    /**
     * @OneToOne(targetEntity="Proyecto", inversedBy="customer")
     */
    protected $proyecto;
    
    /**
     *
     * @var string
     * @Column(type="string", length=255)
     */
    protected $codigo;
    
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
    
    public function getProyecto() {
        return $this->proyecto;
    }
    
    public function setProyecto(Proyecto $proyecto) {
        $this->proyecto = $proyecto;
    }
    
    public function getCodigo() {
        return $this->codigo;
    }
    
    public function setCodigo($codigo) {
        $this->codigo = $codigo;
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
