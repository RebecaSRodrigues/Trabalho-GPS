<?php

class Servidor {

    private $id;
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
    private $statusServidor;

    private $conn;

    function __construct(){
        // Cria uma conexão com o banco de dados
        $this->openConexao();

        // Define o local da hora
        date_default_timezone_set('America/Sao_Paulo');

    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
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

    public function getStatusServidor() {
        return $this->statusServidor;
    }

    public function setStatusServidor($statusServidor) {
        $this->statusServidor = $statusServidor;
    }

    public function insertServidor(){ 
        
        // Prepara o comando SQL
        $sql = "INSERT INTO servidor (cpf, nomeCompleto, logradouro, numero, bairro, complemento, cep, cidade, estado, email, celular, observacao, statusServidor) 
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
                       '{$this->statusServidor}')";

        // Executa o comando SQL
        if(!mysqli_query($this->conn, $sql)){
            echo "Ocorreu um erro: " . mysqli_error($this->conn) . "<br>";
        }
    }

    public function selectAll(){
        // Prepara o comando SQL
        $sql = "SELECT * FROM servidor";        

        // Executa a query           
        $resultado = mysqli_query($this->conn, $sql);
        
        // Armazena os dados em um array
        $servidores = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

        // Libera o $resultado da memória
        mysqli_free_result($resultado);

        return $servidores;
    }

    public function selectById(){
        // Prepara o comando SQL
        $sql = "SELECT * FROM servidor Where id = $this->id";        

        // Executa a query           
        $resultado = mysqli_query($this->conn, $sql);
        
        // Armazena os dados em um array
        $servidor = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

        // Libera o $resultado da memória
        mysqli_free_result($resultado);

        return $servidor;
    }

    public function ativoServidor(){ 
        
        // Prepara o comando SQL
        $sql = "UPDATE servidor SET statusServidor = '{$this->statusServidor}'";

        // Executa o comando SQL
        if(!mysqli_query($this->conn, $sql)){
            echo "Ocorreu um erro: " . mysqli_error($this->conn) . "<br>";
        }
        exit;
    }

    public function updateServidor(){ 
        
        // Prepara o comando SQL
        $sql = "UPDATE servidor 
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
                WHERE id = '{$this->id}'" ;


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