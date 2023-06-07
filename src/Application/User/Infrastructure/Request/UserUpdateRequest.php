<?php

namespace Src\Application\User\Infrastructure\Request;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Src\Application\User\Domain\Exceptions\UserRequestFailedException;
use Src\Shared\Infrastructure\Helper\HttpCodesHelper;
use Src\Shared\Infrastructure\Helper\RequestHelper;

final class UserUpdateRequest extends FormRequest
{
    use RequestHelper, HttpCodesHelper;

    public function rules(): array
    {
        return [
            'password' => 'nullable|string|min:8',
            'name' => 'nullable|string|max:45',
            'email' => 'nullable|string|email|max:255|unique:users',
            'cellphone' => 'nullable|string|max:10|unique:users'
        ];
    }

    public function failedValidation(Validator $validator): void
    {
        throw new UserRequestFailedException($this->formatErrorsRequest($validator->errors()->all()), $this->badRequest());
    }
}
