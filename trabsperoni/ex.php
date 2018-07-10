<?php

    $pOc = $_GET['ip1'];
    $sOc = $_GET['ip2'];
    $tOc = $_GET['ip3'];
    $qOc = $_GET['ip4'];
    $mascaraEmbits = $_GET['ip5'];

    $numBits = 32 - $mascaraEmbits;
/*
   $pOc = 112;
   $sOc = 168;
   $tOc = 112;
   $qOc = 32;
   $mascaraEmbits = 27;
    $numBits = 32 - $mascaraEmbits;
*/
    function numConexoes($numBits)
    {

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

    function primeiroNumero($qOc){
        $resultado = $qOc + 1;
        return $resultado;
    }

    function ultimoNumerodHost($qOc, $numeroDeConexoes){
        $resultado = $qOc + $numeroDeConexoes - 2;
        return $resultado;
    }

    function ultimoNumero($qOc, $numeroDeConexoes){
        $resultado = $qOc + $numeroDeConexoes - 1;
        return $resultado;
    }

    function mascaraDecimal($numeroDeConexoes){
        $mascara = 256 - $numeroDeConexoes;
        $resultado = "255.255.255.".$mascara;
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

    function publicoOuPrivado($pOc, $sOc)
    {
        if ($pOc = 10 || ($pOc = 172 && $sOc > 15 && $sOc < 32) || ($pOc = 192 && $sOc = 168)) {
            return "privado";
        } else {
            return "publico";
        }
    }
    
    $leiDoRetorno = array(numConexoes($numBits), qtdHost(numConexoes($numBits)), qntSubRedes(numConexoes($numBits)), primeiroNumero($tOc), ultimoNumerodHost($tOc, numConexoes($numBits)), ultimoNumero($tOc, numConexoes($numBits)), mascaraDecimal(numConexoes($numBits)), classePertence($pOc), publicoOuPrivado($pOc,$sOc));
    foreach ($leiDoRetorno as $choraBoy){
        echo "$choraBoy \n";
    }

    ?>