<? require_once "annotateInc.php"; ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd"> 
<html>
<head>  
  <meta http-equiv="X-UA-Compatible" content="IE=9" /> 
  <link rel="stylesheet" type="text/css" href="../styles/main.css">
  <link rel="stylesheet" type="text/css" href="../styles/topBar.css">
  <link rel="stylesheet" type="text/css" href="../styles/annotate.css">
  
  <link rel="icon" href="../favicon.ico" type="image/x-icon"> 
  <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
  
  <script type="text/javascript" src="../scripts/annotation.js"></script>
</head>

<body>
<div class="topBarBackground"></div>
  <!-- MAIN-->
  <div id="div_main">
    <!-- TOP BAR-->      
    <? topBar("annotate") ?>

    <!-- CONTENT-->
    <div class="generalContentContainer roundCorners">
    <? if($geneId != "") { // Used so that nothing displays if there's no genes exist! ?>
      <!-- GENE DISPLAY-->     
      <span class="titleFormat textShadow" ><? echo $geneTitle;?></span>
      <hr>
      
      <!-- LABEL -->
      <table class="annotationTable" id="annotationTable">
      	<tr>
	        <td class="textShadow">
	          Feature
	        </td>
	        <td class="textShadow">
	          Id
	        </td>
	        <td class="textShadow">
	          Start
	        </td>
	        <td class="textShadow">
	          End
	        </td>
	        <td class="textShadow">
	          Keep
	        </td>
        </tr>

        <!-- FORM -->
        <form id="specification_form" method="POST" action="makeGeneAccordingToSpecifications.php">
          <? hidden_value($geneId); ?>
          <tr class="specRow" id="specRow">
            <td class="feature">
              <select name="type1" class="geneType" id="type1" onchange="checkCheckbox(this)">
                <option value="1">m7G Cap</option>
                <option value="1">promoter</option>
                <option value="1">5'URT</option>
                <option value="1">Exon</option>
                <option value="0">Intron</option>
                <option value="1">3'URT</option>
                <option value="1">Poly(A) tail</option>
                <option value="1">other</option>
              </select></td>
            <td class="id">
              <input type="text" name="id1" class="idInputBox inputBoxStyle" id="id1" /></td>
            <td class="start">
              <input type="text" name="start1" class="geneStartAndEndMarker inputBoxStyle" id="start1" onkeydown="return checkInputForNumber(event)"/></td>
            <td class="end">
              <input type="text" name="end1" class="geneStartAndEndMarker inputBoxStyle" id="end1" onkeydown="return checkInputForNumber(event)"/></td>
            <td class="keep">
              <input type="checkbox" name="keep1" class="geneCheckbox" id="keep1" checked="true"/></td>
          </tr>
        </form>
      </table>
          <div class="submitBox" id="submit_box">
            <input type="button" value="Add Row" onclick="addRow()" />
            <input type="button" value="Delete Row" onclick="delRow()" />
            <input type="button" value="Clear" onclick="clearRows()" />
            <input type="submit" value="Submit" id="specificationSubmitBotton"/>
          </div>
      <? }
         else { ?>
          <a class="normalLink" href="../upload/upload.php">
            <span class="titleFormat textShadow" >Please upload a DNA Sequence</span> </a>
      <? } ?>
    </div>
  </div>
</body>
</html>