<?php

namespace Src\Application\User\Infrastructure\Request;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Src\Application\User\Domain\Exceptions\UserRequestFailedException;
use Src\Shared\Infrastructure\Helper\HttpCodesHelper;
use Src\Shared\Infrastructure\Helper\RequestHelper;

final class UserStoreRequest extends FormRequest
{
    use RequestHelper, HttpCodesHelper;

    public function rules(): array
    {
        return [
            'password' => 'required|string|min:8',
            'name' => 'required|string|max:45',
            'email' => 'required|string|email|max:255|unique:users',
            'cellphone' => 'required|string|max:10|unique:users'
        ];
    }

    public function failedValidation(Validator $validator): void
    {
        throw new UserRequestFailedException($this->formatErrorsRequest($validator->errors()->all()), $this->badRequest());
    }
}
