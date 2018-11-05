<?php
/**
 * Created by 2018/10/31.
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    const SEX_UNKONW = 10;
    const SEX_BOY = 20;
    const SEX_GIRL = 30;

    protected $table = 'student';

    protected $fillable = ['name', 'age', 'sex'];

    # 插入updated_at 字段为时间戳存储 int
    protected $dateFormat = 'U';

    # 自动维护时间戳
    public $timestamps = true;

    # 获取当前时间
    public function getDateFormat()
    {
        return time();
    }

    # 返回格式为date 'Y-m-d H:m:s'
    protected function asTimestamp($value)
    {
        return $value;
    }

    # 返回时间戳->可以转换为date格式
//    public function asDateTime($value)
//    {
//        return $value;
//    }

    public function getSex($index = null)
    {
        $arr = [
            self::SEX_UNKONW => '未知',
            self::SEX_BOY => '男',
            self::SEX_GIRL => '女'
        ];

        if ($index !== null) {
            return array_key_exists($index, $arr) ? $arr[$index] : $arr[self::SEX_UNKONW];
        }
        return $arr;
    }


}