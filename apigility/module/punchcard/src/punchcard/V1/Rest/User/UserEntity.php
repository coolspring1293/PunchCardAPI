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
    public $rank;

    public function __construct() {
        $this->rank = -1;
    }


    /*
     *     def format_user(self):
        return {
            'id': self.id,
            'userName': self.user_name,
            'name': self.nick_name,
            'continuousDays': self.streak_days,
            'goldCoinAmount': self.gold_coin_amount,
            'lastActivityDate': self.last_activity_date.isoformat(),
            'rank': User.query.filter(User.gold_coin_amount > self.gold_coin_amount).count() + 1
    }
*/
    public function getArrayCopy()
    {
        return array(
            'id'                => $this->id,
            // do not show id
            //'id'                => md5($this->id + time()),
            'userName'          => $this->user_name,
            'name'              => $this->nick_name,
            'password_hash'     => $this->password_hash,

            'password_hash'     => md5(crypt($this->password_hash,
                    substr($this->password_hash, 0, 2)) + time()),

            'continuousDays'    => $this->streak_days,
            'goldCoinAmount'    => $this->gold_coin_amount,
            'lastActivityDate'  => $this->last_activity_date,
            'rank'              => $this->rank,
        );
    }

    public function exchangeArray(array $array, $cur_rank)
    {
        $this->id                   = $array['id'];
        $this->user_name            = $array['user_name'];
        $this->nick_name            = $array['nick_name'];
        $this->password_hash        = $array['password_hash'];
        $this->streak_days          = $array['streak_days'];
        $this->gold_coin_amount     = $array['gold_coin_amount'];
        $this->last_activity_date   = $array['last_activity_date'];
        $this->rank                 = $cur_rank['rank'];
    }
    
    public function createEntityByRegister($userName, $passworo_hash) {
        $this->user_name = $userName;
        $this->password_hash = $passworo_hash;
    }


}

