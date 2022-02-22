<?php

namespace App\Http\Requests\Task;

use App\Http\Requests\Request;

class DeleteTaskRequest extends Request
{
    /**
     * リクエストを行う権限があるかどうか確認
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * バリデーションするルール
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => ['required', 'integer', 'exists:tasks,id'],
        ];
    }

    /**
     * バリデーションエラーのカスタム属性の取得
     */
    public function attributes(): array
    {
        return [
            'id' => 'タスクID',
        ];
    }
}
