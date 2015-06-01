#!/usr/bin/env sh
cd $HOME/projetos/util/noosfero
cp -rv noosfero_files/nbproject ../../noosfero/
cp -v noosfero_files/database.yml ../../noosfero/config/
cp -v noosfero_files/ca/* ../../noosfero/script/

#plugings
cp -v noosfero_files/script/enable_participa_plugins ../../noosfero/script/

#ci
cp -v noosfero_files/ca/* ../../ci_noosfero/script/

#RBenv
cp -v noosfero_files/.rbenv-gemsets ../../noosfero/

