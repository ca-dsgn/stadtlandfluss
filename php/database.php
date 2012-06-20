<?php
/**
 * DAO
 * @author ON09 DHBW Mosbach
 */
class DatabaseException extends Exception {
	
}
 
class Database {

    private $connection;
	
    private $servername;
    private $mysqluser;
    private $mysqlpasswd;
	
	private $database;
   
    public function __construct() {
	
		if ($_SERVER["SERVER_NAME"] == "localhost") {
			
			$this->servername = "localhost";
			$this->mysqluser = "root";
			$this->mysqlpasswd = "root";
			$this->database = "stadtlandfluss";
		}
		else {
			
			$this->servername = "db1105.mydbserver.com";
			$this->mysqluser = "p167191";
			$this->mysqlpasswd = "c4S!#gX4";
			$this->database = "usr_p167191_1";
		}
	}
   
    /**
     * connect to database
     * @param string $databasename 
     * @param string $mode null or ro for readonly
     */
    private function connect($databasename, $mode = null) 
	{
 
        $this->connection = mysql_connect($this->servername, $this->mysqluser, $this->mysqlpasswd);        
        mysql_set_charset('utf8',$this->connection);
        if (!$this->connection) 
		{
            throw new DatabaseException("Could not connect to database: " . mysql_error(), 1);
        }
        if ($databasename) 
		{
            $db_select = mysql_select_db($databasename);
            if ($db_select) 
			{
                //echo 'database'.$databasename.' selected';
            } else 
			{
                //echo $databasename . " could not be selected" . mysql_error();
            }
        }
		
    }

    /**
     * disconnect fom database
     */
    private function disconnect() 
	{
	   mysql_close($this->connection);
	}

    /**
     * querycall to database
     * @param string $query the querytext
	 * @param string $dbName name of the database
	 * @param string $mode null or ro for readonly
     */
    public function query($query, $dbName, $mode) 
	{
		$this->connect($dbName, $mode);
		$result = mysql_query($query);
        if (!$result && __SCOPE__ == "dev") 
		{
            throw new DatabaseException("invalid query: " . $query . " error:" . mysql_error(), 3);
        }
        $resultSet = mysql_fetch_row($result);
		$this->disconnect();
		return $resultSet;
    }
	
	
	/**
	*Same as query function but with field name
	*returning associative array 
	**/
	public function queryAssoc($query, $dbName, $mode) 
	{
		$this->connect($dbName, $mode);
		$result = mysql_query($query);
        if (!$result && __SCOPE__ == "dev") 
		{
            throw new DatabaseException("invalid query: " . $query . " error:" . mysql_error(), 3);
        }
        //$resultSet = mysql_fetch_assoc($result);
		$arr = array();
		while ($row = mysql_fetch_assoc($result)) 
		{
			array_push($arr,$row); //add result to the end of $arr
		}
		$this->disconnect();
		return $arr;
    }
	
	/**
     * Insertion or Update queries
     * @param string $query the querytext
	 * @param string $dbName name of the database
	 * @param string $mode null or ro for readonly
	 * @return affected rows! If return = 0 -> there had been no changes in DB or -1 for failure
     */
    public function queryInsertion($query, $dbName, $mode) 
	{
		$this->connect($dbName, $mode);
		mysql_query($query);
		return mysql_affected_rows();
    }
	
	public function get_database() {
		
		return $this->database;
	}
	
}
?>
