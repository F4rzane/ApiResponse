<?php

declare(strict_types=1);

namespace App\Responses\ClientErrorResponses;

class RequestTimeout
{
    /**
    /**
     * @var string|array|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Translation\Translator|null
     */
    readonly public string $message;

    /**
     * @param int $statusCode
     */
    public function __construct(
        readonly public int $statusCode = 408
    )
    {
        $this->message = trans('responses.408');
    }
}
