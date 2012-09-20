// substitution.js
var stored_index = null;

// Checks if the input is there and that it's a positive number
function is_pos_num(s) {
  if(s == "")
    return false;

  var patt=/[^0-9]/;
  return !s.match(patt);
}

// Shows the gene info
function substitution_info(base) {
  var index = document.getElementById("index").value;

  if(is_pos_num(index) && (parseInt(index) > 0)) {    
    _substitution_info(index, base);
  }
}

// Sends the Ajax request
function _substitution_info(index, base) {  
  var xml = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP"); 
  
  xml.open("POST","_substitution.php",true);
  xml.setRequestHeader("Content-type","application/x-www-form-urlencoded");

  var data = "index="+index+"&base="+base;
  xml.send(data);

  xml.onreadystatechange=function() { // the Call back function
    if (xml.readyState==4 && xml.status==200) {
      var resp = xml.responseText;
      if(resp != 'failed')
        document.getElementById("substitution_info").innerHTML=resp;
    }
  }
}

function gene_info() {
  var index = document.getElementById('index').value;
  if(index != stored_index)
    document.getElementById("substitution_info").innerHTML = '<tr><th>New codon:</th><td></td></tr><tr><th>Nucleic acid level:</th><td></td></tr><tr><th>Protein level:</th><td></td></tr>';
  
  if(index == '') {
    document.getElementById("gene_info").innerHTML = '<tr><th>Base:</th><td></td></tr><tr><th>Codon Position:</th><td></td></tr><tr><th>Old codon:</th><td></td></tr> '
  }

  if(is_pos_num(index) && (parseInt(index) > 0)) {
    stored_index = index;
    _gene_info(index);
  }
  else {
    if(index != "") {
      alert('Enter a non-negative number please!');
      document.getElementById('index').value = "";
    }
  }
}

// Sends the Ajax request
function _gene_info(index) {  
  var xml = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP"); 
  
  xml.open("POST","_gene_info.php",true);
  xml.setRequestHeader("Content-type","application/x-www-form-urlencoded");

  var data = "index="+index;
  xml.send(data);

  xml.onreadystatechange=function() { // the Call back function
    if (xml.readyState==4 && xml.status==200) {
      var resp = xml.responseText;
      if(resp != 'failed')
        document.getElementById("gene_info").innerHTML=resp;
    }
  }
}

