<?php

class Servico {

    private $cliente;
    private $servidor;
    private $dtInicio;
    private $dtFinal;
    private $tipoServico;
    private $preco;

    private $conn;

    function __construct(){
        // Cria uma conexão com o banco de dados
        $this->openConexao();

        // Define o local da hora
        date_default_timezone_set('America/Sao_Paulo');

    }

    public function getCliente() {
        return $cliente->getCpf;
    }

    public function setCliente($cliente) {
        $this->cliente = $cliente;
    }

    public function getServidor() {
        return $this->servidor;
    }

    public function setServidor($servidor) {
        $this->servidor = $servidor;
    }

    public function getDtInicio() {
        return $this->dtInicio;
    }

    public function setDtInicio($dtInicio) {
        $this->dtInicio = $dtInicio;
    }

    public function getDtFinal() {
        return $this->dtFinal;
    }

    public function setDtFinal($dtFinal) {
        $this->dtFinal = $dtFinal;
    }

    public function getTipoServico() {
        return $this->tipoServico;
    }

    public function setTipoServico($tipoServico) {
        $this->tipoServico = $tipoServico;
    }

    public function getPreco() {
        return $this->preco;
    }

    public function setPreco($preco) {
        $this->preco = $preco;
    }

    public function insertServico(){ 

        // Prepara o comando SQL
        $sql = "INSERT INTO servico (cliente, servidor, dtInicio, dtFinal, tipoServico, preco) 
                VALUES('{$this->cliente}',
                       '{$this->servidor}',
                       '{$this->dtInicio}',
                       '{$this->dtFinal}',
                       '{$this->tipoServico}',
                       '{$this->preco}')";

        // Executa o comando SQL
        if(!mysqli_query($this->conn, $sql)){
            echo "Ocorreu um erro: " . mysqli_error($this->conn) . "<br>";
        }
    }

    public function selectAll(){
        // Prepara o comando SQL
        $sql = "SELECT * FROM servicos";        

        // Executa a query           
        $resultado = mysqli_query($this->conn, $sql);
        
        // Armazena os dados em um array
        $servicos = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

        // Libera o $resultado da memória
        mysqli_free_result($resultado);

        return $servicos;
    }

    
    private function openConexao(){
        $host = "localhost";
        $database = "boocket";
        $user = "admin";
        $password = "admin";
        
        $this->conn = mysqli_connect($host, $user, $password, $database);
        $this->conn->set_charset("utf8");
    
        if(mysqli_connect_errno()){
            echo "Erro na conexao com o banco de dados";
        }
    }

    function __destruct(){
        mysqli_close($this->conn);   
    }
}