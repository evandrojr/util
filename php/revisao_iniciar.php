#!/usr/bin/php
<?php
require_once 'lib.php';
$nrevision = $argv[1];

e("clear");
echo "####################################################################\n";
echo "## Iniciando procedimento antes da revisão do ticket $nrevision ##\n";
echo "####################################################################\n";

if(!$nrevision){
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
e("git checkout -b revisao_$nrevision"); 
e("ssh -p 2222 root@localhost rm -rf /opt/tmp/tine20/Cache/zend_cache--*");
// e("/home/93274300500/bin/firefox/firefox -P ".tempnam("/tmp", "cmd")." -new-instance"); 
echo "Se tiver conseguido reproduzir o bug execute o 'git pull' descrito no ticket \n";
echo "Limpe o cache do seu zend com: \n";
echo "ssh -p 2222 root@localhost rm -rfv /opt/tmp/tine20/Cache/zend_cache--*\n";
echo "Limpe também o cache javascript e HTML do seu browser\n";
echo "e verifique se o bug foi resolvido\n";
echo "Uma vez que você esteja com o ticket em sua máquina proceda com o teste/Principal:. Finalizado o procedimento:\n";
echo "1- Não aprovado. Reabra o ticket ao desenvolvedor com sua análise. (coloque o ticket como reaberto e mude a atribuição para o desenvolvedor)\n";
echo "2- Aprovado. Coloque seus comentários (se houverem) e passe o ticket para efetuar o merge. Para isto mude o status para Integrar e passem a atribuição para Cassiano Dal Pizzol.";
