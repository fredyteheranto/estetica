<?php

include_once 'adodb5/adodb.inc.php';
require_once 'adodb5/adodb-active-record.inc.php';
include_once 'config.php';

class db {

    private $host;
    private $db;
    private $user;
    private $pass;
    public static $conn;

    function __construct($host, $db, $user, $pass) {
        $this->host = $host;
        $this->db = $db;
        $this->user = $user;
        $this->pass = $pass;
    }

    public function Conectar() {

        $conn = NewADOConnection('mysql://' . $this->user . ':' . $this->pass . '@' . $this->host . '/' . $this->db);
        $conn->debug = false;
        $conn->Execute("SET NAMES 'utf8'");
        ADOdb_Active_Record::SetDatabaseAdapter($conn);
        return $conn;
    }

}

global $DB;
$conn = new db($localdb->host, $localdb->db, $localdb->user, $localdb->pass);
$DB = $conn->Conectar();

