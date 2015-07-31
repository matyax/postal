# CMS App

## Instrucciones de setup
1. Clonar el repositorio en /apps/cms
1. Instalar Virtual Box https://www.virtualbox.org/
1. Instalar https://www.vagrantup.com/
1. Instalar composer https://getcomposer.org/
1. Correr composer install en /apps/cms
1. Instalar y configurar Homestead http://laravel.com/docs/5.0/homestead
1. En la consola, poner "homestead edit" y colocar los valores de más abajo
1. "sudo vim /etc/hosts" y agregar "192.168.10.10 cms.app"
1. Una vez que está todo configurado, correr "homestead up"
1. Visitar http://cms.app

## Compilar less.
1. En la consola, parado en "/apps/cms" corrés "homestead ssh"
1. Te conecta por SSH a la máquina virtual
1. Tipeás "gulp watch" y empieza a compilar automáticamente
1. Los estilos los pone en public/css/

## Homestead.yml
    ---
    ip: "192.168.10.10"
    memory: 2048
    cpus: 1
    provider: virtualbox

    authorize: ~/.ssh/id_rsa.pub

    keys:
        - ~/.ssh/id_rsa

    folders:
        - map: /apps/cms
          to: /home/vagrant/cms

    sites:
        - map: cms.app
          to: /home/vagrant/cms/public

    databases:
        - cms

    variables:
        - key: APP_ENV
          value: local

    # blackfire:
    #     - id: foo
    #       token: bar
