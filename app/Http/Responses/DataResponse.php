<?php

namespace App\Http\Responses;

use Illuminate\Contracts\Support\Responsable;

class DataResponse implements Responsable
{
    protected int $httpCode;
    protected array | object $data;
    protected string $message;

    public function __construct(int $httpCode, array | object $data = [], string $message = '')
    {
        $this->httpCode = $httpCode;
        $this->data = $data;
        $this->message = $message;
    }

    public function toResponse($request): \Illuminate\Http\JsonResponse
    {

        $payload = [
            "code" => $this->httpCode,
            "data" => $this->data,
            "message" => $this->message,
        ];

        return response()->json(
            data: $payload,
            status: $this->httpCode,
            options: JSON_UNESCAPED_UNICODE
        );
    }
}
