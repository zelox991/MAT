<? require_once "__upload__.php"; ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd"> 
<html>
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=9" /> 

  <link rel="icon" href="../favicon.ico" type="image/x-icon">   
  <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
  
  <link rel="stylesheet" type="text/css" href="../styles/main.css">
  <link rel="stylesheet" type="text/css" href="../styles/top_bar.css">
  <link rel="stylesheet" type="text/css" href="../styles/upload.css">
  
  <script type="text/javascript" src="../scripts/upload.js"></script>
</head>

<body>
    <div class="topBarBackground"></div>
    <!-- MAIN-->
    <div id="div_main">
      <? topBar("upload"); ?> 
      <!-- CONTENT-->
      <div class="generalContentContainer">
        
        <form id="geneUploadForm" enctype="multipart/form-data" method="POST" action="process_upload.php" onsubmit="return check_upload();">
          <span class="titleFormat">Sequence Identifier</span>
          <br/>
          <span class="detailFormat">Please enter a name, number, ??? number or other ID for your sequence.<br>This is for your reference only.</span>
          <hr>
          <input type="text" name="name_gene" id="name_gene"  class="inputBoxStyle" maxlength="30" />            
          <span id="name_geneWarning" class="warningFormat"></span>
          <br/><br/>
          
          <span class="titleFormat">Upload</span><br/>
          <span class="detailFormat">Currently accepted sequence file format: TXT, FASTA</span>
          <hr>
          <input type="file" name="uploadedFile" id="uploadedFile"/>
          <span id="uploadFileWarning" class="warningFormat"></span>
          <br/><br/>
          
          <span class="titleFormat">Notes</span><br/>
          <span class="detailFormat">Jot down any notes for yourself</span>
          <hr>
          <textarea id="notes" name="notes" maxlength="65535" onkeyup="word_count_popup(event);"></textarea>
          <br/>
          <input type="submit" value="Save" id="uploadSubmitButton" class=""/>         
        </form>
        
      </div>
    </div>

</body>
</html>
<? mysql_close($connection); ob_end_flush(); ?>