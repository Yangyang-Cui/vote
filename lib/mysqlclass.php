<?php

	class mySQL {
	
		private $connection;
		function connect($host, $db, $user, $pass='', $charset='utf8', $errMode=PDO::ERRMODE_EXCEPTION, $fetchMode = PDO::FETCH_ASSOC) {
			if(!isset($this->connection))
			{
				$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
				$opt = [
					PDO::ATTR_ERRMODE => $errMode,
					PDO::ATTR_DEFAULT_FETCH_MODE => $fetchMode,
					PDO::ATTR_EMULATE_PREPARES => false
					];
				try {
					$this->connection = new PDO($dsn, $user, $pass, $opt);
				}
				catch(Exception $e){
					//print_r($e);
					echo ("Sorry we could not connect to the database, try again in 10 minutes.");
				}
			}
		}
		
		public function get() {
			return $this->connection;
		}
		
		function query($sql) {
			$this->checkConn();
			$stmt = $this->connection->query($sql);
			return $stmt;
		}
		
		function select ($sql,$data=[]) {
		  $this->checkConn();
		  $stmt = $this->connection->prepare($sql);
		  $stmt ->execute($data);
		  return $stmt;
		}
		
		function insert($sql, $data) {
			$this->checkConn();
			$stmt= $this->connection->prepare($sql);
			$stmt->execute($data);
			$lastId = $this->connection->lastInsertId();
			return $lastId;
			}
		
		
		function update($sql,$data=[]) {
			$this->checkConn();
			$stmt = $this->connection->prepare($sql)->execute($data);
			return $stmt;
		}
		
		function delete($sql,$data=[]) {
			$this->checkConn();
			$stmt = $this->connection->prepare($sql)->execute($data);
			return $stmt;
		}
		
		private function checkConn() {
			if(!isset($this->connection)){
				die("Connection does not exist");
			}
		}
		
	
	}