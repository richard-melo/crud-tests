<?php
use PHPUnit\Framework\TestCase;

class InformationControllerTest extends TestCase
{
    private $gatewayMock;
    private $controller;

    protected function setUp(): void
    {
        $this->gatewayMock = $this->createMock(InformationGateway::class);
        $this->controller = new InformationController($this->gatewayMock);
    }

    public function testGetAllInformation()
    {
        $expectedData = [['id' => '1', 'link' => 'example.com', 'comment' => 'sample comment']];
        $this->gatewayMock->method('getAll')->willReturn($expectedData);

        $this->expectOutputString(json_encode($expectedData));
        $this->controller->processRequest('GET', null);
    }

    public function testGetSingleInformationNotFound()
    {
        $this->gatewayMock->method('get')->willReturn(null);

        $this->expectOutputString(json_encode(["message" => "Information not found"]));
        http_response_code(404);
        $this->controller->processRequest('GET', 'non-existing-id');
    }

    public function testGetSingleInformationFound()
    {
        $sampleData = ['id' => '1', 'link' => 'example.com', 'comment' => 'sample comment'];
        $this->gatewayMock->method('get')->willReturn($sampleData);

        $this->expectOutputString(json_encode($sampleData));
        $this->controller->processRequest('GET', '1');
    }

    public function testCreateInformation()
    {
        $postData = ['link' => 'example.com', 'comment' => 'new comment'];
        $this->gatewayMock->method('create')->willReturn(1);

        file_put_contents('php://input', json_encode($postData));

        $this->expectOutputString(json_encode([
            "message" => "Information created",
            "id" => 1
        ]));
        http_response_code(201);
        $this->controller->processRequest('POST', null);
    }

    public function testUpdateInformation()
    {
        $updateData = ['link' => 'updated.com', 'comment' => 'updated comment'];
        $this->gatewayMock->method('get')->willReturn(['id' => '1']);
        $this->gatewayMock->method('update')->willReturn(1);

        file_put_contents('php://input', json_encode($updateData));

        $this->expectOutputString(json_encode([
            "message" => "Information 1 updated",
            "rows" => 1
        ]));
        $this->controller->processRequest('PATCH', '1');
    }

    public function testDeleteInformation()
    {
        $this->gatewayMock->method('get')->willReturn(['id' => '1']);
        $this->gatewayMock->method('delete')->willReturn(1);

        $this->expectOutputString(json_encode([
            "message" => "Information 1 deleted",
            "rows" => 1
        ]));
        $this->controller->processRequest('DELETE', '1');
    }
}

?>
