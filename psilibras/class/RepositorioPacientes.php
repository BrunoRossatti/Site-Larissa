<?php



class RepositorioPacientes
{
    private PDO $pdo;

    


    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    private function formarObjeto($dados)
    {
        return new Paciente(
            $dados['id'],
            $dados['nome'],
            $dados['cpf'],
            $dados['sexo'],
            $dados['dt_nascimento'],
            $dados  ['telefone'],
            $dados['email'],
            $dados['queixa_principal'],
            $dados['valor_secao'],
            $dados['data_criacao']

        );
         
    }

    public function buscarPaciente(): array
    {
        $sql1 = "SELECT * FROM psilibras.cadastro_paciente";
        $statement = $this->pdo->query($sql1);
        $pacientes = $statement->fetchAll(PDO::FETCH_ASSOC);

        $dadosPaciente = array_map(function ($dados){
            return $this->formarObjeto($dados);
        },$pacientes);

        return $dadosPaciente;
  
    }

    public function excluirPacienteById(int $id)
    {
        $sql1 = "DELETE FROM psilibras.cadastro_paciente WHERE id = ?";
        $statement = $this->pdo->prepare($sql1);
        $statement->bindValue(1, $id);
        $statement->execute();
    }

    public function salvarPaciente(Paciente $paciente)
    {
        $sql1 = "INSERT INTO psilibras.cadastro_paciente(nome,cpf,sexo,dt_nascimento,telefone,email,queixa_principal,valor_secao)
        VALUES (?,?,?,?,?,?,?,?) ";
        $statement = $this->pdo->prepare($sql1);
        $statement->bindValue(1, $paciente->getNome());
        $statement->bindValue(2, $paciente->getCpf());
        $statement->bindValue(3, $paciente->getSexo());
        $statement->bindValue(4, $paciente->getDtNas());
        $statement->bindValue(5, $paciente->getTelefone());
        $statement->bindValue(6, $paciente->getEmail());
        $statement->bindValue(7, $paciente->getQueixa());
        $statement->bindValue(8, $paciente->getValorSecao());
        $statement->execute();
    }

    public function buscarPacienteById(int $id)
    {
        $sql1 = "SELECT * FROM psilibras.cadastro_paciente WHERE id = ?";
        $statement = $this->pdo->prepare($sql1);
        $statement->bindValue(1, $id);
        $statement->execute();

        $dados = $statement->fetch(PDO::FETCH_ASSOC);

        return $this->formarObjeto($dados);

    }

    public function atualizarPaciente(Paciente $paciente)
    {
        $sql1 = "UPDATE psilibras.cadastro_paciente SET nome=?,cpf=?,sexo=?,dt_nascimento=?,telefone=?,email=?,queixa_principal=?,valor_secao=? WHERE id = ?";
        $statement = $this->pdo->prepare($sql1);
        $statement->bindValue(1, $paciente->getNome());
        $statement->bindValue(2, $paciente->getCpf());
        $statement->bindValue(3, $paciente->getSexo());
        $statement->bindValue(4, $paciente->getDtNas());
        $statement->bindValue(5, $paciente->getTelefone());
        $statement->bindValue(6, $paciente->getEmail());
        $statement->bindValue(7, $paciente->getQueixa());
        $statement->bindValue(8, $paciente->getValorSecao());
        $statement->bindValue(9, $paciente->getId());
        $statement->execute();


    }
}

