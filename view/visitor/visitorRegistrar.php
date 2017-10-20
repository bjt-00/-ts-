
							<?php 
							include '../../src/com/bitguiders/dataaccesslayer/DataAccess.php';
							include '../../src/com/bitguiders/util/Date.php';
							$dataAccess = new DataAccess();
							$date = new Date();
							
							if(isset($_GET['IP'])){
								$_SESSION["ip"] = $_GET['IP'];
								$resultset = $dataAccess->getResult("SELECT * FROM visitor where ip='".$_GET['IP']."' and date='".$date->getCurrentDate()."' ");
								$counter=0;
								$id=0;
								while($visitor = mysql_fetch_object($resultset)){
									$counter = $counter+$visitor->total_visits;
									$id = $visitor->id;
								}
								
								$query = '';
								if($counter>0){
									$counter++;
									$query = "update visitor set total_visits=".$counter." where id=".$id;
								}else{
									$query = "insert into visitor values(0,'".$_GET['IP']."','".$_GET['Country']."','".$_GET['City']."',1,'".$date->getCurrentDate()."')";
								}
								echo $query;
								$dataAccess->executeQuery($query);
							}
														
							?>