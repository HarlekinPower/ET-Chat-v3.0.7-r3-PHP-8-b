<?php

// Check Server param
if (version_compare(phpversion(), '8.0.0', '<')) echo "<div style=\"color:red\">FEHLER!!!<br><br>PHP Version = ".phpversion()." (sollte jedoch >= 8.0.0 sein!)</div>";
else		
// redirect
header('Location: ../?InstallIndex');