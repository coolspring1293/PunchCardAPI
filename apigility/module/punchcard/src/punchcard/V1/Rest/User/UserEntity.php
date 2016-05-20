<?php
namespace punchcard\V1\Rest\User;




/**
//Create table user(
//id int primary key,
//user_name varchar(32),
//nick_name varchar(32),
//password_hash varchar(128),
//streak_days int,
//gold_coin_amount int,
//last_activity_date date
//);
 * Class UserEntity
 * @package punchcard\V1\Rest\User
 *
 */

class UserEntity
{
    public $id;
    public $user_name;
    public $nick_name;
    public $password_hash;
    public $streak_days;
    public $gold_coin_amount;
    public $last_activity_date;

    // UserEntity only, not stored in database.
    public $rank = 10086;

    public function __construct() {
        $this->rank = 10086;
    }


    public function getArrayCopy()
    {
        return array(
            'id'                 => $this->id,
            'user_name'          => $this->user_name,
            'nick_name'          => $this->nick_name,
            'password_hash'      => $this->password_hash,
            'streak_days'        => $this->streak_days,
            'gold_coin_amount'   => $this->gold_coin_amount,
            'last_activity_date' => $this->last_activity_date,
            'rank'               => $this->rank,
        );
    }

    public function exchangeArray(array $array)
    {
        $this->id                   = $array['id'];
        $this->user_name            = $array['user_name'];
        $this->nick_name            = $array['nick_name'];
        $this->password_hash        = $array['password_hash'];
        $this->streak_days          = $array['streak_days'];
        $this->gold_coin_amount     = $array['gold_coin_amount'];
        $this->last_activity_date   = $array['last_activity_date'];
        $this->rank                 = 10076;
    }


}

