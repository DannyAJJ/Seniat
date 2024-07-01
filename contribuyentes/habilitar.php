<?php
  session_start();
  $_SESSION['habilitado'] = 'AND `Habilitado` = 0';
  echo "Habilitado con éxito!";
