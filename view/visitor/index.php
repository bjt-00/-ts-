
							<?php 
							include '../../src/com/bitguiders/dataaccesslayer/DataAccess.php';
							include '../../src/com/bitguiders/util/Date.php';
							$dataAccess = new DataAccess();
							$date = new Date();
							?>
			<fieldset>
			<legend>Today's visitors</legend>
							
							<table>
									<tr>
									<td>ID</td>
									<td>IP</td>
									<td>Country</td>
									<td>City</td>
									<td>Total Visits</td>
									<td>Date</td>
									</tr>
							<?php
								$resultset = $dataAccess->getResult("SELECT * FROM visitor where date='".$date->getCurrentDate()."' ");
								$counter=0;
								$id=0;
								while($visitor = mysql_fetch_object($resultset)){
									$counter = $counter+$visitor->total_visits;
									$id = $visitor->id;
									?>
									<tr>
									<td><?php echo $visitor->id; ?></td>
									<td><?php echo $visitor->ip; ?></td>
									<td><?php echo $visitor->country; ?></td>
									<td><?php echo $visitor->city; ?></td>
									<td><?php echo $visitor->total_visits; ?></td>
									<td><?php echo $visitor->date; ?></td>
									</tr>
									
									<?php 
								}
							?>
							</table>
							</fieldset>
			<fieldset>
			<legend>Visitors History</legend>
							
							<table>
									<tr>
									<td>ID</td>
									<td>IP</td>
									<td>Country</td>
									<td>City</td>
									<td>Total Visits</td>
									<td>Date</td>
									</tr>
							<?php
								$resultset = $dataAccess->getResult("SELECT * FROM visitor order by date ");
								$counter=0;
								$id=0;
								while($visitor = mysql_fetch_object($resultset)){
									$counter = $counter+$visitor->total_visits;
									$id = $visitor->id;
									?>
									<tr>
									<td><?php echo $visitor->id; ?></td>
									<td><?php echo $visitor->ip; ?></td>
									<td><?php echo $visitor->country; ?></td>
									<td><?php echo $visitor->city; ?></td>
									<td><?php echo $visitor->total_visits; ?></td>
									<td><?php echo $visitor->date; ?></td>
									</tr>
									
									<?php 
								}
							?>
							</table>
							</fieldset>							