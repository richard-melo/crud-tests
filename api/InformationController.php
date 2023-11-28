<?php

class InformationController
{
    public function __construct(private InformationGateway $gateway)
    {
    }

    public function processRequest(string $method, ?string $id): void
    {
        if ($id) {
            $this->processResourceRequest($method, $id);
        } else {

            $this->processCollectionRequest($method);
        }
    }

    private function processResourceRequest(string $method, string $id): void
    {
        $req = $this->gateway->get($id);

        if (!$req) {
            http_response_code(404);
            echo json_encode(["message" => "Information not found"]);
            return;
        }

        switch ($method) {
            case "GET":
                echo json_encode($req);
                break;

            case "PATCH":

                $errors = $this->getValidationErrors($_POST, false);

                if (!empty($errors)) {
                    http_response_code(422);
                    echo json_encode(["errors" => $errors]);
                    break;
                }

                $rows = $this->gateway->update($req, $_POST);

                echo json_encode([
                    "message" => "Information $id updated",
                    "rows" => $rows
                ]);
                break;

            case "DELETE":
                $rows = $this->gateway->delete($id);

                echo json_encode([
                    "message" => "Information $id deleted",
                    "rows" => $rows
                ]);
                break;

            default:
                http_response_code(405);
                header("Allow: GET, PATCH, DELETE");
        }
    }

    private function processCollectionRequest(string $method): void
    {
        switch ($method) {
            case "GET":
                echo json_encode($this->gateway->getAll());
                break;

            case "POST":
                $errors = $this->getValidationErrors($_POST);

                if (!empty($errors)) {
                    http_response_code(422);
                    echo json_encode(["errors" => $errors]);
                    break;
                }

                $id = $this->gateway->create($_POST);

                http_response_code(201);
                echo json_encode([
                    "message" => "Information created",
                    "id" => $id
                ]);
                header("Location: index.php");
                break;

            default:
                http_response_code(405);
                header("Allow: GET, POST");
        }
    }

    private function getValidationErrors(array $data, bool $is_new = true): array
    {
        $errors = [];

        if ($is_new && empty($data["link"])) {
            $errors[] = "link is required";
        }

        return $errors;
    }
}
