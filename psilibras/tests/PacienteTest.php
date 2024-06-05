<?php

use PHPUnit\Framework\TestCase;

require_once 'class/Paciente.php';

class PacienteTest extends TestCase
{
    private $paciente;

    protected function setUp(): void
    {
        $this->paciente = new Paciente(
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
    }

    public function testGetId()
    {
        $this->assertEquals(1, $this->paciente->getId());
    }

    public function testGetNome()
    {
        $this->assertEquals('João da Silva', $this->paciente->getNome());
    }

    public function testSetNome()
    {
        $this->paciente->setNome('Maria de Souza');
        $this->assertEquals('Maria de Souza', $this->paciente->getNome());
    }

    public function testGetCpf()
    {
        $this->assertEquals('123.456.789-00', $this->paciente->getCpf());
    }

    public function testSetCpf()
    {
        $this->paciente->setCpf('987.654.321-00');
        $this->assertEquals('987.654.321-00', $this->paciente->getCpf());
    }

    // Adicione mais testes para os outros métodos getter e setter

    public function testGetEmail()
    {
        $this->assertEquals('joao@example.com', $this->paciente->getEmail());
    }

    public function testSetEmail()
    {
        $this->paciente->setEmail('maria@example.com');
        $this->assertEquals('maria@example.com', $this->paciente->getEmail());
    }
}
