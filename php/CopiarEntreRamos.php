<?php
error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);

/** 
 * recursively create a long directory path
 */
function createPath($path) {
    if (is_dir($path)) return true;
    $prev_path = substr($path, 0, strrpos($path, '/', -2) + 1 );
    $return = createPath($prev_path);
    return ($return && is_writable($prev_path)) ? mkdir($path) : false;
}

$log=array();

$ramoOrigem=  "/home/93274300500/dev/atual";
$ramoDestino= "/home/93274300500/dev/expresso3";

$as="

/home/93274300500/dev/atual/tine20/Expressomail/translations/en.po
/home/93274300500/dev/atual/tine20/Expressomail/translations/pt_BR.po
/home/93274300500/dev/atual/tine20/Expressomail/js/sieve/RuleConditionsPanel.js
/home/93274300500/dev/atual/tine20/Expressomail/Model/Sieve/Rule.php
/home/93274300500/dev/atual/tine20/Expressomail/js/sieve/RuleEditDialog.js

";









$as= trim($as);
$ar =  explode("\n", $as);

foreach($ar as $a){
    $a = trim($a); 
    if(!file_exists($a) || $a==""){
        $key = array_search($a, $ar);
            if($key!==false){   
            $log[]="[ERRO :(:(:(:(:(:(:(] O arquivo $a não existe";
            print_r($key);
            print_r($a);
            unset($a[$key]);
        }
        continue;
    }
   
    $na = str_replace($ramoOrigem, $ramoDestino, $a);
    createPath(dirname($na));    
    if (!copy($a, $na)) {
        $log[]="[ERRO :(:(:(:(:(:(:(] Falha ao copiar $a para $na";
    }else{
        $log[]="[SUCESSO!!!] $a --> $na";
    }    
}


print_r($log);
