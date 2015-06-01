#!/usr/bin/env sh
echo "Atenção o script build_noosfero não apaga mais os arquivos não versionados, execute reset_noosfero.sh para isso"
cd $HOME/projetos/util/noosfero
git clone git@gitlab.com:evandrojr/noosfero-plugins.git ~/projetos/noosfero/plugins/awesome_debug
./copy_noosfero.sh
