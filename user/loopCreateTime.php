<?php
 echo "<th>
 <SELECT class='selectItem'>
 	<option $select0> {$time[0]}</option>
 	<option $select1> {$time[1]}</option>
 	<option $select2> {$time[2]}</option>
 	<option $select3> {$time[3]}</option>
 	<option $select4> {$time[4]}</option>
 	<option $select5> {$time[5]}</option>
 </SELECT>
</th>";





echo "<th><SELECT class='selectItem'>";
for ($j=0; $j <count($time) ; $j++) { 
$str = "<option "."$".$varName2.">"."\{\$time[".$j."]\}"."</option>";
echo $str;
}
echo "</SELECT> </th>" ;
?>


 echo "<th><SELECT class='selectItem'>";
							 for ($j=0; $j <count($time) ; $j++) {
							 	$varName2 = $selectTemple.$j;
							 	$times=$time[$j];
							 	<literal>echo "<option "."\$".$varName2.">"."\{\$times\}"."</option>";</literal>
							 }
							 echo "</SELECT> </th>" ;