<?php
/*
CREATE USER expressov3userteste WITH PASSWORD 'expressov3pwteste';CREATE DATABASE expressov3dbteste WITH ENCODING 'UTF-8';GRANT ALL PRIVILEGES ON DATABASE expressov3dbteste TO expressov3userteste;

*/


return array (
  'database' => 
  array (
    'host' => 'localhost',
    'dbname' => 'kristinadb',
    'username' => 'expressov3user',
    'password' => 'serpro',
    'adapter' => 'pdo_pgsql',
    'tableprefix' => 'tine20_'
  ),
  'setupuser' => 
  array (
    'username' => 'admin',
    'password' => 'e8d95a51f3af4a3b134bf6bb680a213a',
  ),
  'logger' => 
  array (
    'active' => true,
    'filename' => '/opt/tmp/tine20/tine20.log',
    'priority' => 7,
  ),
  'caching' => 
  array (
    'active' => true,
    'customexpirable' => true,      
    'lifetime' => 120,
    'backend' => 'File',
    'path' => '/opt/tmp/tine20/Cache',
    'redis' => 
    array (
      'host' => 'localhost',
      'port' => 6379,
    ),
    'memcached' => 
    array (
      'host' => 'localhost',
      'port' => 11211,
    ),
  ),
  'actionqueue' => 
  array (
    'active' => false,
    'backend' => 'Redis',
    'host' => 'localhost',
    'port' => 6379,
  ),
  'session' => 
  array (
    'lifetime' => 86400,
    'backend' => 'File',
    'path' => '/opt/tmp/tine20/Session',
    'host' => 'localhost',
    'port' => 6379,
  ),
  'tmpdir' => '/opt/tmp/tine20/Tmp',
  'filesdir' => '/opt/tmp/tine20/FilesDir',
  'mapPanel' => 0,
  'themes' =>
    array (
        'default'     => 2,
        'cookieTheme' => '',
        'themelist'   =>
    array (
        0 =>
            array (
                'name' => 'Tine 2.0 Default Skin',
                'path' => 'tine20',
                'useBlueAsBase' => 1,
            ),
        1 =>
            array (
                'name' => 'Expresso 3.0',
                'path' => 'expresso30',
                'useBlueAsBase' => 1,
            ),
       
	2 =>
            array (
                'name' => 'Serpro',
                'path' => 'serpro',
                'useBlueAsBase' => 1,
            ),
        ),
    ),
);
