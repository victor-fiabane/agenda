<?php
session_start();
class Crud
{
    private $conn;
    private $db_name = "agendadb";
    private $id;
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // -----------------------------------------------------------------------------------------------

    // all the commands involving the view/mod of the database

    public function read()
    {
        $query = "SELECT * FROM agendadb.user";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function readCons()
    {
        $query = "SELECT * FROM agenda.consulta";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function readLogin()
    {
        $query = "SELECT * FROM agendadb.user";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    //TEST ZONE - TEST ZONE - TEST ZONE - TEST ZONE - TEST ZONE - TEST ZONE - TEST ZONE - TEST ZONE

public function readId($id)
{
    $query = "SELECT id, name, email, isAdmin FROM agendadb.user WHERE id = :id";
    
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    
    return $stmt->fetch(PDO::FETCH_ASSOC); 
}





    //TEST ZONE - TEST ZONE - TEST ZONE - TEST ZONE - TEST ZONE - TEST ZONE - TEST ZONE - TEST ZONE -


    public function insertPaciente($cpf, $nome, $medico, $especialidade, $peso, $altura, $data)
    {
        $query = "INSERT into agendadb.paciente (`cpf`, `nome`, `medico`, `especialidade`, `peso`, `altura`, `data`) VALUES (:cpf, :nome, :medico, :especialidade, :peso, :altura, :data);";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':medico', $medico);
        $stmt->bindParam(':especialidade', $especialidade);
        $stmt->bindParam(':peso', $peso);
        $stmt->bindParam(':altura', $altura);
        $stmt->bindParam(':data', $data);
        $stmt->execute();
        return $stmt;
    }

    public function readPaciente($cpf)
    {
        $query = "SELECT * from agendadb.paciente WHERE cpf=:cpf;";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->execute();
        return $stmt;
    }
    public function updatePaciente($cpf, $nome, $medico, $especialidade, $peso, $altura, $data)
    {
        $query = "UPDATE agendadb.paciente set `nome` = :nome, `medico` = :medico, `especialidade` = :especialidade, `peso` = :peso, `altura` = :altura, `data` = :data WHERE `cpf` = :cpf";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':medico', $medico);
        $stmt->bindParam(':especialidade', $especialidade);
        $stmt->bindParam(':peso', $peso);
        $stmt->bindParam(':altura', $altura);
        $stmt->bindParam(':data', $data);
        $stmt->execute();
        return $stmt;
    }
//Não sei o uso no momento - NÃO MEXER
    public function readPac()
    {
        $query = "SELECT * FROM agendadb.paciente";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    //DEBUG NÃO MEXER//DEBUG NÃO MEXER//DEBUG NÃO MEXER//DEBUG NÃO MEXER//DEBUG NÃO MEXER//DEBUG NÃO MEXER
    /*public function removerPaciente($cpf)
    {
        $query = "DELETE FROM agendadb.paciente WHERE cpf='$cpf'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute() or die(error_log($stmt));
    }*/
        public function removerPaciente($cpf)
{
    $query = "DELETE FROM agendadb.paciente WHERE cpf = '$cpf'";
    
    try {
        
        $rowsAffected = $this->conn->exec($query);
        
        // Retorna TRUE se uma ou mais linhas foram afetadas, ou FALSE se 0 linhas foram afetadas.
        return ($rowsAffected > 0); 
        
    } catch (PDOException $e) {
        // Se tiver erro no SQL retorna FALSE.
        error_log("Erro ao tentar remover paciente: " . $e->getMessage());
        return false;
    }
}
//Sem uso no momento
    public function insertManutencao($plate, $tecnico,$date)
    {
        $query = "INSERT into pneutrackdb.manutencao (`tecnico`, `fktruck`, `date`) VALUES (:tecnico, :plate ,:date);";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':plate', $plate);
        $stmt->bindParam(':tecnico', $tecnico);
        $stmt->bindParam(':date', $date);
        $stmt->execute();
        return $stmt;
    }
//Sem uso no momento
    public function readManutencoes($cpf)
    {
        $query = "SELECT * FROM pneutrackdb.manutencao WHERE fktruck='$plate' ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }




} # end of the class