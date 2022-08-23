<?php

namespace App;

include 'Ficha.php';

interface interfazTablero{

    public function TableroX() : int; 
    public function TableroY() : int; 
    public function TableroLimpiar();
    public function FichaPoner(int $x, int $y, Ficha $ficha);
    public function FichaSacar(int $x, int $y);  
    public function FichaHay(int $x, int $y); 
    public function ValorCasilla(int $x,int $y);
}

class Tablero implements interfazTablero
{
    protected int $dimX;
    protected int $dimY;

    protected $tablero;

    public function __construct (int $dim_x = 7, int $dim_y = 7) {
        if($dim_x <= 4 && $dim_y <= 4){
            throw new Exception("El tablero debe ser de al menos 4 por 4");
        }

        $this->dimX = $dim_x;
        $this->dimY = $dim_y;

        $this->TableroLimpiar();

    }
    
    public function TableroX() : int{
        return $this->dimX;
    }

    public function TableroY() : int{
        return $this->dimY;
    }


    public function TableroLimpiar(){
        for($x = 0; $x < $this->TableroX(); $x++){
            for($y = 0; $y < $this->TableroY(); $y++){
                $this->tablero[$x][$y] = "0";
            }
        }
    } 
    
    public function FichaPoner(int $x, int $y, Ficha $ficha){

        $this->tablero[$x][$y] = $ficha;
    }

    public function FichaPonerUsuario(int $x,Ficha $ficha){

        if($this->FichaHay($x,0)){
            throw new Exception("La columna esta llena");
        }
        
        for($y = $this->TableroY() - 1; $y >= 0; $y--){
            if($this->FichaHay($x,$y) != TRUE){
                $this->FichaPoner($x,$y,$ficha);

                break;
            }
        }

    }

    public function FichaSacar(int $x, int $y){

        if($x > $this->TableroX() || $y > $this->TableroY()){
            throw new Exception("ingrese valores de posicion dentro del rango del tablero");
        }

        $this->tablero[$x][$y] = "0";
    }

    public function FichaSacarUsuario(int $x){

        if($this->FichaHay($x,$this->TableroY() - 1) == FALSE){
            throw new Exception("No hay fichas que sacar");
        }

        for($y = 0; $y < $this->TableroY(); $y++){
            if($this->FichaHay($x,$y) == TRUE){
                $this->FichaSacar($x,$y);
                
                break;
            }
        }
    }

    
    public function FichaHay(int $x, int $y){

        if($this->tablero[$x][$y] != "0")
            return TRUE;
        else
            return FALSE;
    }
    
    
    public function ValorCasilla(int $x,int $y){

        if($this->tablero[$x][$y] == "0"){
            return $this->tablero[$x][$y];
        }
        else{
            return $this->tablero[$x][$y]->queColorSoy();
        }
    }

    public function mostrarTablero(){
        for($y = 0; $y < $this->TableroY(); $y++){
            
            for($x = 0;$x < $this->TableroX(); $x++){

                print($this->ValorCasilla($x,$y));

            }
            
            print("\n");
        }
        print("\n\n");
    }
}