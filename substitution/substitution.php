<? require_once '__substitution__.php'; ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd"> 
<html>
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=9" />
  
  <!-- FAVICON -->
  <link rel="icon" href="../favicon.ico" type="image/x-icon"> 
  <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
  
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="../styles/main.css">
  <link rel="stylesheet" type="text/css" href="../styles/top_bar.css">
  <link rel="stylesheet" type="text/css" href="../styles/substitution.css">
  <link rel="stylesheet" type="text/css" href="../styles/substitution.css">
  
  <!-- JAVASCRIPT -->
  <script type="text/javascript" src="../scripts/main.js"></script>
  <script type="text/javascript" src="../scripts/substitution.js"></script>
</head>

<body>
  <div class="topBarBackground"></div>
  <!-- MAIN-->
  <div id="div_main" >
  <? topBar('mutation'); ?> 
    
    <!-- CONTENT-->
    <div class="generalContentContainer">
      <!-- GENE DISPLAY-->
      <? if($id_gene != "") { // Used so that nothing displays if there's no genes exist! ?>
        <span class="titleFormat" ><? echo $name_gene;?></span>
        <? mutation_navbar('substitution'); ?>
        <hr>
        
        <div class="ContentContainer">
          <form>
            <span class="formLabel" style="margin-left: 30px;"> Choose Base: </span>
            <input type="text" id="index" name="index" class="inputBoxStyle text_small"  onkeyup="info_gene()"/>
            <br><br>
            <span class="formLabel" style="margin-left: 50px;"> Change To: </span>
            <input type="button" class="submitButton button_small" value="A" onclick="info_substitution(this.value)"/>
            <input type="button" class="submitButton button_small" value="T" onclick="info_substitution(this.value)"/>
            <input type="button" class="submitButton button_small" value="G" onclick="info_substitution(this.value)"/>
            <input type="button" class="submitButton button_small" value="C" onclick="info_substitution(this.value)"/> 
          </form>
        </div>
        <br>
        <table id="info_gene" style="color: white;" class="info">
          <tr>
            <th>Base:</th>
            <td></td>
          </tr>
          <tr>
            <th>Codon Position:</th>
            <td></td>
          </tr>
          <tr>
            <th>Old codon:</th>
            <td></td>
          </tr>           
        </table><br>
        <table id='info_substitution' style="color: white" class="info">
          <tr>
            <th>New codon:</th>
            <td></td>
          </tr>
          <tr>
            <th>Nucleic acid level:</th>
            <td></td>
          </tr>
          <tr>
            <th>Protein level:</th>
            <td></td>
          </tr>
        </table>
      <? }
         else { ?>
          <a class="normalLink" href="../upload/upload.php">
            <span class="titleFormat textShadow" >Please upload a DNA Sequence</span> </a>
      <? } ?>
    </div>
  </div>
</body>
</html>
<? mysql_close($connection); ob_end_flush(); ?>