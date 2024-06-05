<?php

use PHPUnit\Framework\TestCase;

require_once 'class/Paciente.php';
require_once 'class/RepositorioPacientes.php';

class RepositorioPacientesTest extends TestCase
{
    private $pdoMock;
    private $repositorio;

    protected function setUp(): void
    {
        $this->pdoMock = $this->createMock(PDO::class);
        $this->repositorio = new RepositorioPacientes($this->pdoMock);
    }

    public function testBuscarPaciente()
    {
        $statementMock = $this->createMock(PDOStatement::class);
        $statementMock->expects($this->once())
                      ->method('fetchAll')
                      ->willReturn([
                          [
                              'id' => 1,
                              'nome' => 'João da Silva',
                              'cpf' => '123.456.789-00',
                              'sexo' => 'Masculino',
                              'dt_nascimento' => '2000-01-01',
                              'telefone' => '123456789',
                              'email' => 'joao@example.com',
                              'queixa_principal' => 'Dor de cabeça',
                              'valor_secao' => '150',
                              'data_criacao' => '2022-01-01'
                          ]
                      ]);

        $this->pdoMock->expects($this->once())
                      ->method('query')
                      ->with('SELECT * FROM psilibras.cadastro_paciente')
                      ->willReturn($statementMock);

        $pacientes = $this->repositorio->buscarPaciente();

        $this->assertCount(1, $pacientes);
        $this->assertInstanceOf(Paciente::class, $pacientes[0]);
        $this->assertEquals('João da Silva', $pacientes[0]->getNome());
    }

    public function testExcluirPacienteById()
    {
        $statementMock = $this->createMock(PDOStatement::class);
        $statementMock->expects($this->once())
                      ->method('execute');

        $this->pdoMock->expects($this->once())
                      ->method('prepare')
                      ->with('DELETE FROM psilibras.cadastro_paciente WHERE id = ?')
                      ->willReturn($statementMock);

        $this->repositorio->excluirPacienteById(1);
    }

    public function testSalvarPaciente()
    {
        $statementMock = $this->createMock(PDOStatement::class);
        $statementMock->expects($this->once())
                      ->method('execute');

        $this->pdoMock->expects($this->once())
                      ->method('prepare')
                      ->with($this->callback(function ($sql) {
                          $expected = "INSERT INTO psilibras.cadastro_paciente(nome,cpf,sexo,dt_nascimento,telefone,email,queixa_principal,valor_secao) VALUES (?,?,?,?,?,?,?,?)";
                          $actual = preg_replace('/\s+/', ' ', trim($sql));
                          $expected = preg_replace('/\s+/', ' ', trim($expected));
                          return $actual === $expected;
                      }))
                      ->willReturn($statementMock);

        $paciente = new Paciente(
            null,
            'João da Silva',
            '123.456.789-00',
            'Masculino',
            '2000-01-01',
            '123456789',
            'joao@example.com',
            'Dor de cabeça',
            '150',
            null
        );

        $this->repositorio->salvarPaciente($paciente);

        // Adicione uma asserção para que o teste não seja considerado arriscado
        $this->assertTrue(true);
    }

    public function testBuscarPacienteById()
    {
        $statementMock = $this->createMock(PDOStatement::class);
        $statementMock->expects($this->once())
                      ->method('execute');
        $statementMock->expects($this->once())
                      ->method('fetch')
                      ->willReturn([
                          'id' => 1,
                          'nome' => 'João da Silva',
                          'cpf' => '123.456.789-00',
                          'sexo' => 'Masculino',
                          'dt_nascimento' => '2000-01-01',
                          'telefone' => '123456789',
                          'email' => 'joao@example.com',
                          'queixa_principal' => 'Dor de cabeça',
                          'valor_secao' => '150',
                          'data_criacao' => '2022-01-01'
                      ]);

        $this->pdoMock->expects($this->once())
                      ->method('prepare')
                      ->with('SELECT * FROM psilibras.cadastro_paciente WHERE id = ?')
                      ->willReturn($statementMock);

        $paciente = $this->repositorio->buscarPacienteById(1);

        $this->assertInstanceOf(Paciente::class, $paciente);
        $this->assertEquals('João da Silva', $paciente->getNome());
    }

    public function testAtualizarPaciente()
    {
        $statementMock = $this->createMock(PDOStatement::class);
        $statementMock->expects($this->once())
                      ->method('execute');

        $this->pdoMock->expects($this->once())
                      ->method('prepare')
                      ->with('UPDATE psilibras.cadastro_paciente SET nome=?,cpf=?,sexo=?,dt_nascimento=?,telefone=?,email=?,queixa_principal=?,valor_secao=? WHERE id = ?')
                      ->willReturn($statementMock);

        $paciente = new Paciente(
            1,
            'João da Silva',
            '123.456.789-00',
            'Masculino',
            '2000-01-01',
            '123456789',
            'joao@example.com',
            'Dor de cabeça',
            '150',
            '2022-01-01'
        );

        $this->repositorio->atualizarPaciente($paciente);
    }
}
