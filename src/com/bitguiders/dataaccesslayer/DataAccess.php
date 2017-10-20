 <?php 
   class DataAccess{
   	public $host = "localhost:3306";
   	public $user ="root";
   	public $password  ="";
   	public $db   ="thesuffah_db";

   	public $counter=0;
   	 function dbConnect(){
   		// initialize parameters
   		// connect to database
   		$db_connection = mysql_connect($this->host,$this->user,$this->password) or die("Connection failed");
		if (!$db_connection) { 
			$db_connection = mysql_connect($this->host,$this->user2,$this->password) or die("Connection failed");
		} 
		if (!$db_connection) { 
			$db_connection = mysql_connect($this->host,$this->user3,$this->password) or die("Connection failed");
		} 
		if (!$db_connection) { 
			die('Could not connect: ' . mysql_error()); 
		} 
		

   		mysql_select_db($this->db,$db_connection);	
   		return $db_connection;
		
   	}
   	
   	function getResult($query){
  		$db_connection = $this->dbConnect();
		mysql_query("set names utf8");
   		$result=mysql_query($query,$db_connection); 
   		return $result; 
   	}
   	function executeQuery($query){
   		//mysql_query("set names utf8");
   		$db = new mysqli($this->host,$this->user,$this->password,$this->db);
   		$db->multi_query($query);
   		//return $db->insert_id;
  	}
 	function getSize($resultset){
 		return mysql_num_rows($resultset);
 	}
	function getNoOfQueries(){
	$res = $this->getResult("SHOW SESSION STATUS LIKE 'Questions'");
	$row = mysql_fetch_array($res, MYSQL_ASSOC);
	define("TOTAL_QUERIES",$row['Value']);
	
	if(!isset($_SESSION['TOTAL_QUERIES'])){$_SESSION['TOTAL_QUERIES']=0;}
	$_SESSION['TOTAL_QUERIES'] +=(TOTAL_QUERIES-1);
	return $_SESSION["TOTAL_QUERIES"];
   }
   
 }
 ?>