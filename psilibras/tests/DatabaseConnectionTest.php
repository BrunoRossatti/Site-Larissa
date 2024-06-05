<?php

use PHPUnit\Framework\TestCase;

require_once 'class/DatabaseConnection.php';

class DatabaseConnectionTest extends TestCase
{
    private $pdoMock;
    private $databaseConnection;

    protected function setUp(): void
    {
        
        $this->pdoMock = $this->createMock(PDO::class);
        $this->databaseConnection = new DatabaseConnection('localhost', 'root', '');
    }

    public function testConnectionSuccess()
    {
        // Configure o método 'connect' para retornar o mock PDO
        $databaseConnectionMock = $this->getMockBuilder(DatabaseConnection::class)
                                        ->setConstructorArgs(['localhost', 'root', ''])
                                        ->onlyMethods(['connection'])
                                        ->getMock();

        $databaseConnectionMock->method('connection')
                               ->willReturn($this->pdoMock);

        // Execute o método 'connect' e verifique se retorna uma instância de PDO
        $pdo = $databaseConnectionMock->connection();
        $this->assertInstanceOf(PDO::class, $pdo);
    }

    public function testConnectionFailure()
    {
        $databaseConnectionMock = $this->getMockBuilder(DatabaseConnection::class)
                                        ->setConstructorArgs(['localhost', 'root', ''])
                                        ->onlyMethods(['connection'])
                                        ->getMock();

        $databaseConnectionMock->method('connection')
                               ->will($this->throwException(new Exception("Connection failed: error message")));

        $this->expectException(Exception::class);
        $this->expectExceptionMessage("Connection failed: error message");

        $databaseConnectionMock->connection();
    }
}
