# Escuela de Ciencias de la Computación e Informática (ECCI)
## Ingeniería de Software 2
### Proyecto PROTEA

Este es un proyecto desarrollado por estudiantes avanzados de la ECCI, para un módulo de la facultad de Educación, llamada PROTEA.<br>
El proyecto consiste en un sistema de reservación de recursos. En donde recurso es algo muy general, ya que puede ser cualquier cosa.<br>

En este momento está en desarrollo. <br>

## Tecnologías utilizadas:
#### Cakephp 3
#### Javascript
#### Mysql
#### FullCalendar
#### LDAP
<br>

## Guía de instalación
<br>

<ol>
  <li> Descargue el proyecto</li>
  <li> Copie la carpeta src en la ubicación en donde realizará la instalación</li>
  <li> Abra el archivo <strong>src/protea_reservations/config/app.php</strong> </li>
  <li> Configure a partir de la línea 244 la conexión a la base de datos </li>
</ol>

  <br>
  <p>En este punto debería poder acceder a la aplicación desde la web. Si no le funciona... Probablemente no tenga instalada la extensión intl de PHP o la extensión ldap, para solucionarlo haga lo siguiente: </p>
  
  <br>
  <h5> Si está usando un equipo Debian o Ubuntu, digite el siguiente comando en la consola:</h5>
  <ol>
    <li><i> sudo apt-get update</i></li>
    <li><i> sudo apt-get install php5-intl</i></li>
    <li><i> sudo apt-get install php5-ldap</i></li>
    <li><i> sudo service apache2 restart</i></li>
  </ol>
  <br>
  <br>
  
  <h5> Si está usando un equipo con Windows y está usando xampp o wampp deberá hacer lo siguiente:</h5> 
    <ol>
    <li><i>Diríjase a la carpeta PHP (de xampp o wampp)</i></li>
    <li><i>Abra el archivio php.ini</i></li>
    <li><i>Busque la línea que dice <strong>;intl</strong> y quite el <strong>;</strong></i></li>
    <li><i>Busque la línea que dice <strong>;ldap</strong> y quite el <strong>;</strong></i></li>
    <li><i>Apague y encienda el apache del xampp o del wampp</i></li>
  </ol>
  <br>
  
  ## Requerimientos de software
  
  <ul>
    <li>PHP 5.6 o más reciente</li>
  </ul>
  
  
  <p> Para mayor información diríjase a la guía de instalación de CakePhp http://book.cakephp.org/3.0/en/installation.html, para inglés o http://book.cakephp.org/3.0/es/installation.html para español. </p>


