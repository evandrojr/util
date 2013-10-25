<?php
$nrevision = $argv[1];
$repository_path= "/home/93274300500/dev/expresso3";

function e($cmd){
    $stdout ="stdout";
    $stderr ="stderr";
    $return = cmd_exec($cmd, $stdout, $stderr);
    echo "-->$cmd\n";
    if($return != 0){
        echo "################################################################################\n";        
        echo "## Erro na execução de $cmd ##\n";
        echo "################################################################################\n";                
    }
    if(!empty($stdout)){
        echo implode('', $stdout);
    }
    if(!empty($stderr)){
        echo implode('', $stderr);
    }
    return $return;            
}


function cmd_exec($cmd, &$stdout, &$stderr)
{
    $outfile = tempnam("/tmp", "cmd");
    $errfile = tempnam("/tmp", "cmd");
    $descriptorspec = array(
        0 => array("pipe", "r"),
        1 => array("file", $outfile, "w"),
        2 => array("file", $errfile, "w")
    );
    $proc = proc_open($cmd, $descriptorspec, $pipes);
   
    if (!is_resource($proc)) return 255;

    fclose($pipes[0]);    //Don't really want to give any input

    $exit = proc_close($proc);
    $stdout = file($outfile);
    $stderr = file($errfile);

    unlink($outfile);
    unlink($errfile);
    return $exit;
}

echo "###################### Iniciando procedimento de teste antes da revisão do ticket $nrevision ######################\n";
e("cd $repository_path");
e("git status");
e("git branch");
e("git checkout expressov3");
e("git pull upstream expressov3");
e("git checkout -b revisao_$nrevision"); 
e("ssh -p 2222 root@localhost rm -rfv /opt/tmp/tine20/Cache/zend_cache--*");
echo "Se tiver conseguido reproduzir o bug execute o 'git pull' descrito no ticket \n";
echo "Limpe o cache do seu zend com: \n";
echo "ssh -p 2222 root@localhost rm -rfv /opt/tmp/tine20/Cache/zend_cache--*\n";
echo "Limpe também o cache javascript e HTML do seu browser\n";
echo "e verifique se o bug foi resolvido\n";
echo "Uma vez que você esteja com o ticket em sua máquina proceda com o teste/Principal:. Finalizado o procedimento:\n";
echo "1- Não aprovado. Reabra o ticket ao desenvolvedor com sua análise. (coloque o ticket como reaberto e mude a atribuição para o desenvolvedor)\n";
echo "2- Aprovado. Coloque seus comentários (se houverem) e passe o ticket para efetuar o merge. Para isto mude o status para Integrar e passem a atribuição para Cassiano Dal Pizzol.";

