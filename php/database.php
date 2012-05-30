<?php

/**
 * DatabaseException
 * 
 * DB Exception to throw
 *
 * @author gh xxx
 * @package myaccount
 */
class DatabaseException extends Exception {
     
}

/**
 * Database
 * 
 * DB Main class
 *
 * @author gh xxx
 * @package myaccount
 */
class Database {

    private $connection;
    private $servername = "localhost";
    private $mysqluser = "root";
    private $mysqlpasswd = "";
   
    /**
     * connect
     *
     * connect to database
     * 
     * @param string $databasename 
     * @param string $mode null or ro for readonly
     */
    public function connect($databasename, $mode = null) {
    
        $this->connection = mysql_connect($this->servername, $this->mysqluser, $this->mysqlpasswd);        
        mysql_set_charset('utf8',$this->connection);   
        
        if (!$this->connection) {
            
            throw new DatabaseException("Could not connect to database: " . mysql_error(), 1);
        }
        if ($databasename) {
            $db_select = mysql_select_db($databasename);


            if ($db_select) {
                //echo 'database $databasename selected';
            } else {
                //echo $databasename . " could not be selected" . mysql_error();
            }
        }
    }

    /**
     * disconnect
     *
     * disconnect fom database
     *
     */
    public function disconnect() {
        
        mysql_close($this->connection);
    }

    /**
     * query
     *
     * querycall to database
     *
     * @param string $query the querytext
     */
    public function query($query) {
 
	$result = mysql_query($query);

        if (!$result && __SCOPE__ == "dev") {
            throw new DatabaseException("invalid query: " . $query . " error:" . mysql_error(), 3);
        }

        return $result;
    }

}

?>
