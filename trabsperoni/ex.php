<?php

    $pOc = $_GET['ip1'];
    $sOc = $_GET['ip2'];
    $tOc = $_GET['ip3'];
    $mascaraEmbits = $_GET['ip4'];

    $numBits = 32 - $mascaraEmbits;

    function numConexoes($numeroDeBits)
    {
        $numBits = 32 - $numeroDeBits;
        $numeroDeConexoes = pow(2, $numBits);
        return $numeroDeConexoes;
    }

    function qtdHost($numeroConexoes){
        $resultado = $numeroConexoes - 2;
        return $resultado;
    }

    function qntSubRedes($numeroConexoes){
        $resultado = 256/$numeroConexoes;
        return $resultado;
    }

    function primeiroNumero($tOc){
        $resultado = $tOc + 1;
        return $resultado;
    }

    function ultimoNumerodHost($tOc, $numeroDeConexoes){
        $resultado = $tOc + $numeroDeConexoes - 2;
        return $resultado;
    }

    function ultimoNumero($tOc, $numeroDeConexoes){
        $resultado = $tOc + $numeroDeConexoes - 1;
        return $resultado;
    }

    function mascaraDecimal($numeroDeConexoes){
        $mascara = 256 - $numeroDeConexoes;
        $resultado = "255.255.255" + $mascara;
        return $resultado;
    }

    function classePertence($pOc){
        if ($pOc < 128){
            return "Classe A";
        } elseif ($pOc < 192){
            return "Classe B";
        } elseif ($pOc < 224){
            return "Classe C";
        } elseif ($pOc < 240){
            return "CLasse D";
        } else {
            return "Classe E";
        }
    }

    function publicoOuPrivado($pOc, $sOc){
        if ($pOc = 10 || ($pOc = 172 && $sOc > 15 && $sOc < 32) || ($pOc = 192 && $sOc = 168)){
            return "privado";
        } else{
            return "publico";
        }
    }
    ?>