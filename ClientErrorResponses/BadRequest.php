<?php

declare(strict_types=1);

namespace App\Responses\ClientErrorResponses;

class BadRequest
{
    /**
     * @var string|array|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Translation\Translator|null
     */
    readonly public string $message;

    /**
     * @param int $statusCode
     */
    public function __construct(
        readonly public int $statusCode = 400
    )
    {
        $this->message = trans('responses.400');
    }
}
