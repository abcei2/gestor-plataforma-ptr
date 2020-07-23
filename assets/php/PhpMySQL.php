<?php

class Database {

	private $host;
	private $user;
	private $pass;
	private $name;
	public  $link;
	private $error;
	private $errno;
	private $query;
// localhost WMS
	function __construct($host = '192.168.0.12', $user = 'wms', $pass = 'wms.2015', $name = "MERCURY", $conn = 1) {
		$this -> host = $host;
		$this -> user = $user;
		$this -> pass = $pass;
		if (!empty($name)) $this -> name = $name;
		if ($conn == 1) $this -> connect();
	}

	function __destruct() {
		@mysql_close($this->link);
	}

	public function resultarray($queryResult,$key)
	{
		if ($queryResult)
		{
			$rawdata = array();
			$i=0;
			while ($IPDisp = $this->fetch_array_assoc($queryResult))
			{
				$rawdata[$i] = $IPDisp[$key];
				$i++;
			}
			return $rawdata;
		}
		return false;
	}
	public function connect() {
		if ($this -> link = mysql_connect($this -> host, $this -> user, $this -> pass)) {
			if (!empty($this -> name)) {
				if (!mysql_select_db($this -> name)) $this -> exception("Could not connect to the database!");
			}
		} else {
			$this -> exception("Could not create database connection!");
		}
	}

	public function close() {
		@mysql_close($this->link);
	}

	public function query($sql) {
		if ($this->query = @mysql_query($sql)) {
			return $this->query;
		} else {
			//$this->exception("Could not query database!");
			return false;
		}
	}

	public function num_rows($qid) {
		if (empty($qid)) {
			$this->exception("Could not get number of rows because no query id was supplied!");
			return false;
		} else {
			return mysql_num_rows($qid);
		}
	}

	public function fetch_array($qid) {
		if (empty($qid)) {
			$this->exception("Could not fetch array because no query id was supplied!");
			return false;
		} else {
			$data = mysql_fetch_array($qid);
		}
		return $data;
	}

	public function fetch_array_assoc($qid) {
		if (empty($qid)) {
			$this->exception("Could not fetch array assoc because no query id was supplied!");
			return false;
		} else {
			$data = mysql_fetch_array($qid, MYSQL_ASSOC);
		}
		return $data;
	}

	public function fetch_array_num($qid) {
		if (empty($qid)) {
			$this->exception("Could not fetch array num because no query id was supplied!");
			return false;
		} else {
			$data = mysql_fetch_array($qid, MYSQL_NUM);
		}
		return $data;
	}

	public function fetch_all_array($sql, $assoc = true) {
		$data = array();
		if ($qid = $this->query($sql)) {
			if ($assoc) {
				while ($row = $this->fetch_array_assoc($qid)) {
					$data[] = $row;
				}
			} else {
				while ($row = $this->fetch_array($qid)) {
					$data[] = $row;
				}
			}
		} else {
			return false;
		}
		return $data;
	}

	public function last_id() {
		if ($id = mysql_insert_id()) {
			return $id;
		} else {
			return false;
		}
	}

	private function exception($message) {

    }
}
?>
