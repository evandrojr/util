#!/usr/bin/php
<?php
require_once 'lib.php';
$ntask = $argv[1];

e("clear");
echo "#################################################\n";
echo "### Procedimento pós COMMIT ticket $ntask ###\n";
echo "#################################################\n";

if(!$ntask){
    echo "número da tarefa não informado, tá fumado é?\n";
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
e("git fetch upstream");
e("git checkout -b expressov3 upstream/expressov3");
e("git reset --hard");
$r=e("git pull upstream expressov3");
$r=e("git checkout task$ntask");
if($r!=0){
    echo "O branch da tarefa não foi encontrado\n";
    exit(1);
}
$r=e("git rebase expressov3");
if($r!=0){
    echo "Talvez tenha dado conflito no rebase! Corrija os conflitos e dê outro commit\n";
    exit(1);
}
$r=e("git push origin task$ntask");
if($r!=0){
    echo "Erro no momento do push!\n";
}
e("git status");
e("ssh -p 2222 root@localhost rm -rf /opt/tmp/tine20/Cache/zend_cache--*");
