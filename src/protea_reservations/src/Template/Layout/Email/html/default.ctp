<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
<head>
    <title>Reservaciones PROTEA</title>
    <style>
      #navbar-background
      {
          background-color: #767779;
          padding-bottom: 20px;  
      }

      .navbar
      {
          background: #91BB1B;
          padding-bottom: 20px;
          margin: 100px 0px 10px 0px;
          border-top-left-radius: 40px;
      }

      #body
      {
        text-align: center;
        background-color: #D5D4C8;
        padding: 20px 0 20px 0;
      }

    </style>
</head>
<body>    
    
    <div id="navbar-background">
      <div class="navbar">
      </div>
    </div>

    <div id="body">
      <?= $this->fetch('content') ?>      
    </div>
    
</body>
</html>
