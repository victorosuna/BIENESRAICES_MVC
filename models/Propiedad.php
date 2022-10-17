<?php

namespace Model;

use App\Propiedad as AppPropiedad;

class Propiedad extends Activerecord{
    protected static $tabla = "propiedades";
    protected static $columnasDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'creado', 'vendedorId'];

    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedorId;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->estacionamiento = $args['estacionamiento'] ?? '';
        $this->creado = date('Y/m/d');
        $this->vendedorId = $args['vendedorId'] ?? '';
    }

    public function validar(){
        if(!$this->titulo){
            self::$errores[] = "Debes colocar un titulo";
        }
    
        if(!$this->precio){
            self::$errores[] = "Debes indicar el precio";
        }
    
        if(!$this->descripcion){
            self::$errores[] = "Debes incluir una descripción de la propiedad";
        }
    
        if(!$this->habitaciones){
            self::$errores[] = "Debes indicar el numero de habitaciones";
        }
    
        if(!$this->wc){
            self::$errores[] = "Debes indicar el numero de baños";
        }
    
        if(!$this->estacionamiento){
            self::$errores[] = "Debes indicar el numero de estacionamientos disponibles";
        }
    
        if(!$this->vendedorId){
            self::$errores[] = "Elige un vendedor";
        }
    
            if(!$this->imagen){
                self::$errores[]="La Imagen es obligatoria";
            }
    

        return self::$errores;
    }
}