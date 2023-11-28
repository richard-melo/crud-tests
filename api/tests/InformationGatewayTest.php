<?php

use PHPUnit\Framework\TestCase;
use Mockery as m;

class InformationGatewayTest extends TestCase
{
    private $pdo;
    private $gateway;
    private $database;

    protected function setUp(): void
    {
        $this->pdo = m::mock(PDO::class);
        $this->database = m::mock(Database::class);
        $this->database->shouldReceive('connect')->andReturn($this->pdo);
        $this->gateway = new InformationGateway($this->database);
    }

    public function testCreate()
    {
        $data = [
            'link' => 'https://example.com',
            'comment' => 'Test Comment',
            'difficulty' => 3,
            'responsible' => 'Test User'
        ];

        $this->pdo->shouldReceive('prepare')
            ->once()
            ->andReturn($stmt = m::mock(PDOStatement::class));

        $stmt->shouldReceive('bindValue')->times(4);
        $stmt->shouldReceive('execute');
        $this->pdo->shouldReceive('lastInsertId')->andReturn(1);

        $result = $this->gateway->create($data);

        $this->assertEquals(1, $result);
    }

    public function testGetAll()
    {
        $this->pdo->shouldReceive('prepare')
            ->once()
            ->andReturn($stmt = m::mock(PDOStatement::class));

        $stmt->shouldReceive('execute');
        $stmt->shouldReceive('fetchAll')->andReturn(['data']);

        $result = $this->gateway->getAll();

        $this->assertEquals(['data'], $result);
    }

    public function testGet()
    {
        $id = '1';

        $this->pdo->shouldReceive('prepare')
            ->once()
            ->andReturn($stmt = m::mock(PDOStatement::class));

        $stmt->shouldReceive('bindValue')->once();
        $stmt->shouldReceive('execute');
        $stmt->shouldReceive('fetch')->andReturn(['data']);

        $result = $this->gateway->get($id);

        $this->assertEquals(['data'], $result);
    }

    public function testUpdate()
    {
        $req = ['id' => '1'];
        $data = ['comment' => 'Updated Comment'];

        $this->pdo->shouldReceive('prepare')
            ->once()
            ->andReturn($stmt = m::mock(PDOStatement::class));

        $stmt->shouldReceive('bindValue')->times(count($data) + 1);
        $stmt->shouldReceive('execute');
        $stmt->shouldReceive('rowCount')->andReturn(1);

        $result = $this->gateway->update($req, $data);

        $this->assertEquals(1, $result);
    }

    public function testDelete()
    {
        $id = '1';

        $this->pdo->shouldReceive('prepare')
            ->once()
            ->andReturn($stmt = m::mock(PDOStatement::class));

        $stmt->shouldReceive('bindValue')->once();
        $stmt->shouldReceive('execute');
        $stmt->shouldReceive('rowCount')->andReturn(1);

        $result = $this->gateway->delete($id);

        $this->assertEquals(1, $result);
    }

    protected function tearDown(): void
    {
        m::close();
    }
}
