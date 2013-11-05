#!/usr/bin/php
<?php
require_once 'lib.php';
$ntask = $argv[1];

e("clear");
echo "############################################################\n";
echo "### Iniciando procedimento pré modificação ticket $ntask ###\n";
echo "############################################################\n";

if(!$ntask){
    echo "número da tarefa não informado\n";
    exit(1);
}

$r=e("git status");
if($r!=0){
    echo "Talvez você não esteja em um repositório, se ligue velho!\n";
    exit(1);
}

$r=e("git checkout master");
if($r!=0){
    echo "Talvez você tenha esquecido de dar commit, viuje!\n";
    exit(1);
}

e("git branch -D expressov3");
e("git fetch -p upstream");
e("git checkout -b expressov3 upstream/expressov3");
e("git reset --hard");
e("git status");
e("git checkout -b task$ntask"); 
e("ssh -p 2222 root@localhost rm -rf /opt/tmp/tine20/Cache/zend_cache--*");
