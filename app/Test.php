<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    //定义表名
    protected $table = 'test';

    //禁止更新时间戳，默认会更新created_at和updated_at
    public $timestamps = false;

    //可以批量赋值的属性，什么叫做批量赋值，就是我们可以通过create方法插入的，不是save那种，create是直接传入一个索引数组，
    //save 是通过给实例的属性一个个赋值，就这点看来，确实有批量赋值的意思
    protected $fillable = ['name'];php
}
