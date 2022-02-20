<?php

namespace App\UseCases;

class CreateTaskUseCase
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * 必要なものは先にinjectionする
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * 処理実行
     * 
     * @param array $where 条件
     */
    public function execute()
    {
        // このユースケースに必要な処理を書く
    }
}
