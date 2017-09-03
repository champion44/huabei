echo "<th>
							<SELECT class='selectItem'>
							<option $select0>  {$time[0]}</option>
							<option $select1> {$time[1]}</option>
							<option $select2> {$time[2]}</option>
							<option $select3>  {$time[3]}</option>
							<option $select4> {$time[4]}</option>
							<option $select5> {$time[5]}</option>
							</SELECT>
							</th>";












						echo "<th><SELECT class='selectItem'>";
							 $selectTemple2 = "$select";
							for ($i=0; $i < count($time); $i++) { 
								$str1 = $selectTemple2.$i;
								$str2 = "$time[".$i."]";
								$str="<option ".$str1.">{".$str2."}</option>";
								echo "$str";
							}
							echo "</SELECT></th>";