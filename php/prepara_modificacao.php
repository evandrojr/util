<?php
$ntask = $argv[1];

function e($cmd, $dir="/home/93274300500/dev/expresso3"){
    $stdout ="stdout";
    $stderr ="stderr";
    $return = cmd_exec($cmd, $stdout, $stderr, $dir);
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


function cmd_exec($cmd, &$stdout, &$stderr, $dir)
{
    $outfile = tempnam("/tmp", "cmd");
    $errfile = tempnam("/tmp", "cmd");
    $descriptorspec = array(
        0 => array("pipe", "r"),
        1 => array("file", $outfile, "w"),
        2 => array("file", $errfile, "w")
    );
    $proc = proc_open($cmd, $descriptorspec, $pipes, $dir);
   
    if (!is_resource($proc)) return 255;

    fclose($pipes[0]);    //Don't really want to give any input

    $exit = proc_close($proc);
    $stdout = file($outfile);
    $stderr = file($errfile);

    unlink($outfile);
    unlink($errfile);
    return $exit;
}

e("clear");
echo "#############################################################################################################\n";
echo "###################### Iniciando procedimento de teste antes da modificacao do ticket $ntask ##################\n";
echo "#############################################################################################################\n";

e("git checkout master");
e("git branch -D expressov3");
e("git fetch -p upstream");
e("git checkout -b expressov3 upstream/expressov3");
e("git reset --hard");
e("git status");
e("git checkout -b task$ntask"); 
e("ssh -p 2222 root@localhost rm -rf /opt/tmp/tine20/Cache/zend_cache--*");
