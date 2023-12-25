<?php

use think\migration\Seeder;

class User extends Seeder
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    //解决办法参考：https://blog.csdn.net/guohun01/article/details/133777196
    public function run():void
    {
        $data = [[
            'username' => '7Yan',
            'password' => '7Yan',
            'login_status' => 1,
            'login_code' => '7Yan',
            'last_login_time' => date('Y-m-d H:i:s')
        ]];
        $this->table('user')->insert($data)->save();
    }

    public function down(){
        $this->execute('TRUNCATE TABLE user');
    }
}