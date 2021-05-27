<?php

class Cliente {

    private $cpf;
    private $nomeCompleto;
    private $logradouro;
    private $numero;
    private $bairro;
    private $complemento;
    private $cep;
    private $cidade;
    private $estado;
    private $email;
    private $celular;
    private $observacao;
    private $statusCliente;

    private $conn;

    function __construct(){
        // Cria uma conexão com o banco de dados
        $this->openConexao();

        // Define o local da hora
        date_default_timezone_set('America/Sao_Paulo');

    }

    public function getCpf() {
        return $this->cpf;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    public function getNomeCompleto() {
        return $this->nomeCompleto;
    }

    public function setNomeCompleto($nomeCompleto) {
        $this->nomeCompleto = $nomeCompleto;
    }

    public function getLogradouro() {
        return $this->logradouro;
    }

    public function setLogradouro($logradouro) {
        $this->logradouro = $logradouro;
    }

    public function getNumero() {
        return $this->numero;
    }

    public function setNumero($numero) {
        $this->numero = $numero;
    }

    public function getBairro() {
        return $this->bairro;
    }

    public function setBairro($bairro) {
        $this->bairro = $bairro;
    }

    public function getComplemento() {
        return $this->complemento;
    }

    public function setComplemento($complemento) {
        $this->complemento = $complemento;
    }

    public function getCep() {
        return $this->cep;
    }

    public function setCep($cep) {
        $this->cep = $cep;
    }

    public function getCidade() {
        return $this->cidade;
    }

    public function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getCelular() {
        return $this->celular;
    }

    public function setCelular($celular) {
        $this->celular = $celular;
    }

    public function getObservacao() {
        return $this->observacao;
    }

    public function setObservacao($observacao) {
        $this->observacao = $observacao;
    }

    public function getStatusCliente() {
        return $this->statusCliente;
    }

    public function setStatusCliente($statusCliente) {
        $this->statusCliente = $statusCliente;
    }

    public function insertCliente(){ 
        
        // Prepara o comando SQL
        $sql = "INSERT INTO cliente (cpf, nomeCompleto, logradouro, numero, bairro, complemento, cep, cidade, estado, email, celular, observacao, statusCliente) 
                VALUES('{$this->cpf}',
                       '{$this->nomeCompleto}',
                       '{$this->logradouro}',
                       '{$this->numero}',
                       '{$this->bairro}',
                       '{$this->complemento}',
                       '{$this->cep}',
                       '{$this->cidade}',
                       '{$this->estado}',
                       '{$this->email}',
                       '{$this->celular}',
                       '{$this->observacao}',
                       '{$this->statusCliente}')";

        // Executa o comando SQL
        if(!mysqli_query($this->conn, $sql)){
            echo "Ocorreu um erro: " . mysqli_error($this->conn) . "<br>";
        }
    }

    public function selectAll(){
        // Prepara o comando SQL
        $sql = "SELECT * FROM cliente";        

        // Executa a query           
        $resultado = mysqli_query($this->conn, $sql);
        
        // Armazena os dados em um array
        $clientes = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

        // Libera o $resultado da memória
        mysqli_free_result($resultado);

        return $clientes;
    }

    public function selectById(){
        // Prepara o comando SQL
        $sql = "SELECT * FROM cliente Where cpf = $this->cpf";        

        // Executa a query           
        $resultado = mysqli_query($this->conn, $sql);
        
        // Armazena os dados em um array
        $cliente = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

        // Libera o $resultado da memória
        mysqli_free_result($resultado);

        return $cliente;
    }

    public function ativoCliente(){ 
        
        // Prepara o comando SQL
        $sql = "UPDATE cliente SET statusCliente = '{$this->statusCliente}' WHERE cpf = $this->cpf";

        // Executa o comando SQL
        if(!mysqli_query($this->conn, $sql)){
            echo "Ocorreu um erro: " . mysqli_error($this->conn) . "<br>";
        }
        exit;
    }

    public function updateCliente(){ 
        
        // Prepara o comando SQL
        $sql = "UPDATE cliente 
                SET nomeCompleto = '{$this->nomeCompleto}', 
                email = '{$this->email}',
                logradouro = '{$this->logradouro}',
                numero = '{$this->numero}',
                bairro = '{$this->bairro}',
                complemento = '{$this->complemento}',
                cep = '{$this->cep}',
                cidade = '{$this->cidade}',
                estado = '{$this->estado}',
                celular = '{$this->celular}',
                observacao = '{$this->observacao}' 
                WHERE cpf = '{$this->cpf}'" ;


        // Executa o comando SQL
        if(!mysqli_query($this->conn, $sql)){
            echo "Ocorreu um erro: " . mysqli_error($this->conn) . "<br>";
        }
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