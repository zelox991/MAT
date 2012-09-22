<?php /* get_exons.php */

/* Retrieving the exons */
$q_exons =
  "SELECT a.start, a.end, a.name
   FROM shunyu_annotations AS a
   JOIN shunyu_features_global AS global
   WHERE a.id_feature_global = global.id AND global.name = 'Exon'
   ORDER BY a.start";
$r_exons = mysql_query($q_exons);

/* Collect the exons */
$exons = array();
while($tmp = mysql_fetch_assoc($r_exons)) {
  $exons[] = $tmp;
}

?>