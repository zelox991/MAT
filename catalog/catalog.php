<? require_once '__catalog__.php'; ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd"> 
<html>
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=9" /> 
  <link rel="stylesheet" type="text/css" href="../styles/main.css">
  <link rel="stylesheet" type="text/css" href="../styles/top_bar.css">
  <link rel="stylesheet" type="text/css" href="../styles/catalog.css">
  
  <link rel="icon" href="../favicon.ico" type="image/x-icon"> 
  <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
  
  <script type="text/javascript" src="../scripts/main.js"></script>
  <script type="text/javascript" src="../scripts/catalog.js"></script>
  <script>
  function go() {
    var x = document.getElementById("showcase1");
    x.style.height = "500px";
  }

</script>
  
</head>

<body>
<div class="topBarBackground"></div>
  <!-- MAIN-->
  <div id="div_main">
    <!-- TOP BAR-->      
    <? topBar("catalog"); ?> 

    <!-- CONTENT-->
    <div class="generalContentContainer">
      <!-- TITLE -->
      <span class="titleFormat" >Sequences</span>
      <table id="catalog">
      <!-- LABEL -->
        <? require_once './+table_catalog.php'; ?>
      </table>
    </div>
  </div>
</body>
</html>
<? mysql_close($connection); ob_end_flush(); ?>