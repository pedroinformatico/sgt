<?php

/**
 * MySQL provides access to the underlying database.
 */
$base = explode($_SERVER['DOCUMENT_ROOT'], __FILE__);
$base = explode("/taller", $base[1]);
require_once $GLOBALS['__BASESERVER__']. '/taller/base/_config/SQLValues.php';

class MySQL {

    /**
     * The actual object from the MySQL API
     * @var MySQL_link_identifier
     */
    private $connection;

    /**
     * The actual return value of mysql_query
     * @link http://de3.php.net/manual/en/function.mysql-query.php
     * @var mixed
     */
    private $resource;

    /**
     * The QSL statement
     * @var string
     */
    private $sql;

    /**
     * @var MySQL
     */
    private static $_singleton;

    public static function getInstance() {
        if (is_null(self::$_singleton)) {
            self::$_singleton = new MySQL();
        }
        return self::$_singleton;
    }

    private function __construct() {
        $this->connection = mysql_connect('localhost', SQLValues::USER, SQLValues::PASS);
        mysql_select_db(SQLValues::BD, $this->connection);
        mysql_set_charset('utf8');
        $this->resource = null;
    }

    /**
     * Executes the previously defined query.
     * @return mixed the resource or null on error
     */
    public function execute() {
        if (!($this->resource = mysql_query($this->sql, $this->connection))) {
            return null;
        }
        return $this->resource;
    }

    /**
     * Executes the previously defined query.
     * @return boolean success of the query.
     */
    public function alter() {
        if (!($this->resource = mysql_query($this->sql, $this->connection))) {
            return false;
        }
        return true;
    }

    public function insert() {
        $this->alter();
        return mysql_insert_id();
    }

    public function mysqlError() {
        return mysql_error();
    }

    /**
     * Executes the previously defined query assuming it is a select statement.
     * @return multitype:unknown The rows from the DB as an array of objects
     */
    public function loadObjectList() {
        if (!($cur = $this->execute())) {
            return null;
        }
        $array = array();
        while ($row = mysql_fetch_object($cur)) {
            $array[] = $row;
        }
        return $array;
    }

    /**
     * set the query
     * @param string $sql the sql statement
     * @return boolean false if the sql statement is empty
     */
    public function setQuery($sql) {
        if (empty($sql)) {
            return false;
        }
        $this->sql = $sql;
        return true;
    }

    /**
     * free all memory associated with the result identifier
     * @return boolean true
     */
    public function freeResults() {
// 		mysql_free_result($this->resource);
        return true;
    }

    /**
     * Executes the previously defined query assuming it is a select statement.
     * @return unknown The first row from the DB as an object
     */
    public function loadObject() {
        if ($cur = $this->execute()) {
            if ($object = mysql_fetch_object($cur)) {
                mysql_free_result($cur);
                return $object;
            } else {
                return null;
            }
        } else {
            return false;
        }
    }

    public function getListByTable($dbTable, $dbUid = '', $orden = 'DESC') {

        $strSQL = 'SELECT * FROM ' . $dbTable;
        if ($dbUid) {
            $strSQL = $strSQL . ' ORDER BY ' . $dbUid . ' ' . $orden;
        };

        $this->setQuery($strSQL);
        return $this->loadObjectList();
    }

    public function getParcialListByTable($limite, $dbTable, $dbUid = '', $orden = 'DESC') {
        $strSQL = 'SELECT * FROM ' . $dbTable;
        if ($dbUid) {
            $strSQL = $strSQL . ' ORDER BY ' . $dbUid . ' ' . $orden;
        };
        $strSQL = $strSQL . ' LIMIT ' . $limite;

        $this->setQuery($strSQL);
        return $this->loadObjectList();
    }

    function __destruct() {
        $this->freeResults();
        mysql_close($this->connection);
    }

}

?>
