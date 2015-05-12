#!/usr/bin/env sh
cd $HOME/projetos/utils/noosfero
cp -rv noosfero_files/nbproject ../../noosfero/
cp -v noosfero_files/database.yml ../../noosfero/config/
cp -v noosfero_files/debug.rb ../../noosfero/config/initializers/
cp -v noosfero_files/ca ../../noosfero/script/ca/
cp -v noosfero_files/script/enable_participa_plugins ../../noosfero/script/

#ci
cp -v noosfero_files/ca ../../ci_noosfero/script/ca/
cp -v noosfero_files/script/enable_participa_plugins ../../ci_noosfero/script/

#RBenv
cp -v noosfero_files/.rbenv-gemsets ../../noosfero/

#awesome print plugin
cp -rv noosfero_files/awesome_print ../../noosfero/plugins/
cp -v noosfero_files/awesome_print.rb ../../noosfero/config/initializers/
