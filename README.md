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
<br>

## Guía de instalación
<br>

<ol>
  <li> Descargue el proyecto</li>
  <li> Copie la carpeta src en la ubicación en donde realizará la instalación</li>
  <li> Abra el archivo <strong>src/protea_reservations/app.php</strong> </li>
  <li> Configure a partir de la línea 217 la conexión a la base de datos </li>
</ol>

  <br>
  <p>En este punto debería poder acceder a la aplicación desde la web. Si no le funciona... Probablemente no tenga instalada la extensión intl de PHP, para solucionarlo haga lo siguiente: </p>
  
  <br>
  <h5> Si está usando un equipo Debian o Ubuntu, digite el siguiente comando en la consola:</h5> 
  <i> sudo apt-get install php5-intl</i>
  
  <br>
  <h5> Si está usando un equipo Windows y está usando xampp o wampp:</h5> 
  <i> Diríjase a la carpeta PHP (de xampp o wampp)y <strong>abra el archivio php.ini y descomente (quite el punto y coma) donde dice intl</strong></i>
  
  <br>
  
  <p> Para mayor información diríjase a la guía de instalación de CakePhp http://book.cakephp.org/3.0/en/installation.html, para inglés o http://book.cakephp.org/3.0/es/installation.html para español. </p>


