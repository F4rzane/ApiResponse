<?php

namespace App\Responses;

use Illuminate\Http\JsonResponse;

class ApiResponse
{
    protected $meta;
    protected $result;
    protected string $message;
    protected int $statusCode;

    /**
     * @param $responseClass
     * @param $result
     * @param $message
     * @param $meta
     * @param array|null $errors
     * @param $actions
     * @return JsonResponse
     */
    public function generate($responseClass, $result = null, $message = null, $meta = null, array $errors = null, $actions = null): JsonResponse
    {
        $responsibleObject = new ($responseClass);
        $this->statusCode = $responsibleObject->statusCode;

        $response = [
            'errors' => $errors,
            'message' => $message,
            'result' => $result,
        ];

        if (is_array($response['message']) && !empty($response['message']))
        {
            if (! array_key_exists('field', $response['message']))
                $response['message']['field'] = null;

            if (! array_key_exists('dialog', $response['message']))
                $response['message']['dialog'] = false;

            if (! array_key_exists('type', $response['message']))
                $response['message']['type'] = 'error';
        }

        if ($meta != null)
        {
            $meta = [
                'current_page' => $meta->currentPage(),
                'total_pages' => $meta->lastPage(),
                'items_per_page' => $meta->perPage(),
                'total_items' => $meta->total(),
            ];
        }

        $response['meta'] = $meta;
        $response['actions'] = $actions;

        return response()->json($response)->setStatusCode($this->statusCode);
    }

    /**
     * @return int
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }
}
