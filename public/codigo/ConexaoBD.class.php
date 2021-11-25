<?php
	class ConexaoBD{
		private $servidor;
		private $usuario;
		private $senha;
		private $db;
		private $porta;
		private $conn;
		
		public function __construct(){
			$this->servidor = 'localhost';
			$this->usuario = 'root';
			$this->senha = 'voale@123';
			$this->db = 'projeto_pizzaria';
			$this->porta = '3306';
			//$this->porta = '3307';
		}
		
		public function conectar(){
			$this->conn = mysqli_connect($this->servidor, $this->usuario,$this->senha,$this->db,$this->porta) or die (mysqli_error());
			mysqli_select_db($this->conn, $this->db) or die (mysqli_error());
		}
		
		public function fechar(){
			mysqli_close($this->conn);
		}
		
		public function query($sql){
			$query = mysqli_query($this->conn, $sql) or die (mysqli_error());
			return $query;
		}
	}

?>