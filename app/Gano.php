<?php

namespace App;

interface interfazGanador{

    public function quienGano(Tablero $tablero, int $x, int $y);
    
}

class Ganador implements interfazGanador{


    public function quienGano(Tablero $tablero, int $x, int $y){


        if($tablero->devolverValorCasilla($x,$y) != "0"){
            if($this->ganadorhori($tablero,$x,$y) == TRUE || $this->ganadorvert($tablero,$x,$y) == TRUE || $this->d($tablero,$x,$y) == TRUE){
                return $tablero->devolverValorCasilla($x,$y);
            }
            else{
                return "nadie";
            }
        }
        else{
            return "nadie";
        }
    }

    protected function ganadorhori(Tablero $tablero, int $x, int $y){

        $ficha = $tablero->devolverValorCasilla($x, $y);
        $contador = 0;
        for($i = 0; $i < $tablero->dimensionTableroHori(); $i++){
            if($contador == 4){
                return TRUE;
            }
            if($ficha == $tablero->devolverValorCasilla($i, $y)){
                $contador++;
            }
            else{
                $contador = 0;
            }
        }
        if($contador == 4){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }

    protected function ganadorvert(Tablero $tablero, int $x, int $y){
        $ficha = $tablero->devolverValorCasilla($x, $y);
        $contador = 0;
        for($i = 0; $i < $tablero->dimensionTableroVert(); $i++){
            if($contador == 4){
                return TRUE;
            }
            if($ficha == $tablero->devolverValorCasilla($x, $i)){
                $contador++;
            }
            else{
                $contador = 0;
            }
        }
        if($contador == 4){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }

    protected function ganadordiagonal(Tablero $tablero, int $x, int $y){
        $ficha = $tablero->devolverValorCasilla($x, $y);
        $contador = 0;
        $ganador = FALSE;

        for($posicionX = $x - 3,$posicionY = $y - 3; $posicionX != $x + 4 && $posicionY != $y  + 4; $posicionX++. $posicionY++){
            if($contador == 4){
                return TRUE;
            }
            if($posicionX < $tablero->dimensionTableroHori() && $posicionX >= 0 && $posicionY < $tablero->dimensionTableroVert() && $posicionY >= 0 ){
                if($ficha == $tablero->devolverValorCasilla($posicionX,$posicionY)){
                    $contador++;
                }
                else{
                    $contador = 0;
                }
            }
        }

        if($contador >= 4){

            $ganador = TRUE;

            return $ganador;
        }

        
        for($posicionX = $x + 3, $posicionY = $y - 3; $posicionX != $x - 4 && $posicionY != $y + 4; $posicionX--, $posicionY++){
            if($contador == 4){
                return TRUE;
            }
            if($posicionX <= $tablero->dimensionTableroHori() && $posicionX >= 0 && $posicionY <= $tablero->dimensionTableroVert() && $posicionY >= 0 ){
                if($ficha == $tablero->devolverValorCasilla($posicionX,$posicionY)){
                    $contador++;
                }
                else{
                    $contador = 0;
                }
            }

        }

        if($contador >= 4){
            $ganador = TRUE;

            return $ganador;
        }

    }
    
}