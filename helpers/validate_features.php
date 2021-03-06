<?php /* validate_features.php */

require_once dirname(__FILE__).'/length_gene.php';

/* Error checking with helpful hints*/
if($name_annotation == '')
  die('Please enter a name!');
if(!ctype_digit($start))
  die('Please enter a positive integer for start!');
if(!ctype_digit($end))
  die('Please enter a positive integer for end!');
if((int)$start <= 0)
  die('Start should be a positive integer!');
if((int)$end > $length_gene)
  die('End should be at most the length of the sequence('.$length_gene.')!');
if((int)$start > (int)$end)
  die('Start cannot be bigger than end!');

/* Check to see if the data is exactly the same */
if(isset($id_annotation)) {
  $q_annotation =
    "SELECT *
     FROM $table_annotations
     WHERE id = $id_annotation";
  $r_annotation = mysql_query($q_annotation) or die('Fetching annotation unsuccessful.');
  $a_annotation = mysql_fetch_assoc($r_annotation);
  $annotation = $a_annotation;

  if(($annotation['name'] == $name_annotation) && 
     ($annotation['start'] == (int)$start) &&
     ($annotation['end'] == (int)$end)) {

    if((($scope_feature == 'global') && ($annotation['id_feature_global'] == $id_feature)) ||
       (($scope_feature == 'user') && ($annotation['id_feature_user'] == $id_feature))) {
      die('success'); // Do not need further processing
    }
  }
}

/* Check for repeats */
/*
Differentiates between submition and changes
For changes we need to exclude itself, thus the
"id != $id_annotation AND"
*/
$q_annotations_id_annotation = (isset($id_annotation)) ? "id != $id_annotation AND" : '';
$q_annotations =
  "SELECT id
   FROM $table_annotations
   WHERE $q_annotations_id_annotation id_gene=$id_gene AND name='$name_annotation'";
$r_annotations = mysql_query($q_annotations) or die('Retrieving annotations unsuccessful.');
$count_annotations = mysql_num_rows($r_annotations);

if($count_annotations > 0) {
  die('This name is in use! Sorry!');
}

if(($scope_feature == 'global') && ($id_feature == 1)) {
  require_once dirname(__FILE__).'/validate_exon.php';
}

?>