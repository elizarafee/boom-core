<?php

class Model_User_Token extends Model_Auth_User_Token
{
    protected $_belongs_to = ['user' => ['model' => 'Person']];
}