
							<?php 
							include '../../src/com/bitguiders/dataaccesslayer/DataAccess.php';
							include '../../src/com/bitguiders/util/Date.php';
							$dataAccess = new DataAccess();
							$date = new Date();
							?>
			<fieldset>
			<legend>Today's Reported Bugs</legend>
							
							<table>
									<tr style="background:orange;color:#ffffff;">
									<td>Bug No</td>
									<td>User</td>
									<td>Type</td>
									<td>Para No</td>
									<td>Sura No</td>
									<td>Verse No</td>
									<td>Quran Script</td>
									<td>Translation</td>
									<td>Date</td>
									<td>Description</td>
									</tr>
							<?php
								$resultset = $dataAccess->getResult("SELECT * FROM bug where date like'".$date->getCurrentDate()."%' ");
								while($bug = mysql_fetch_object($resultset)){
									?>
									<tr>
										<td><?php echo $bug->bug_no; ?></td>
										<td><?php echo $bug->user_id; ?></td>
										<td><?php echo $bug->type; ?></td>
										<td><?php echo $bug->para_no; ?></td>
										<td><?php echo $bug->sura_no; ?></td>
										<td><?php echo $bug->verse_no; ?></td>
										<td><?php echo $bug->quran_script; ?></td>
										<td><?php echo $bug->translation; ?></td>
										<td><?php echo $bug->date; ?></td>
										<td><?php echo $bug->description; ?></td>
									</tr>
									
									<?php 
								}
							?>
							</table>
							</fieldset>
			<fieldset>
			<legend>Total Reported Bugs</legend>
							
							<table>
									<tr style="background:orange;color:#ffffff;">
									<td>Bug No</td>
									<td>User</td>
									<td>Type</td>
									<td>Para No</td>
									<td>Sura No</td>
									<td>Verse No</td>
									<td>Quran Script</td>
									<td>Translation</td>
									<td>Date</td>
									<td>Description</td>
									</tr>
														<?php
								$resultset = $dataAccess->getResult("SELECT * FROM bug order by date ");
								while($bug = mysql_fetch_object($resultset)){
									?>
									<tr>
										<td><?php echo $bug->bug_no; ?></td>
										<td><?php echo $bug->user_id; ?></td>
										<td><?php echo $bug->type; ?></td>
										<td><?php echo $bug->para_no; ?></td>
										<td><?php echo $bug->sura_no; ?></td>
										<td><?php echo $bug->verse_no; ?></td>
										<td><?php echo $bug->quran_script; ?></td>
										<td><?php echo $bug->translation; ?></td>
										<td><?php echo $bug->date; ?></td>
										<td><?php echo $bug->description; ?></td>
									</tr>
									<?php 
								}
							?>
							</table>
							</fieldset>							