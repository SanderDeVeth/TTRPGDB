<?php

class UserSessions extends Model {
    public function __construct() {
        $table = 'user_sessions';
        parent::__construct($table);
    }

    public static function getFromCookie(){
        if (COOKIE::exists(REMEMBER_ME_COOKIE_NAME)) {
            $userSession = new self();
            $userSession = $userSession->findFirst([
                'conditions' => "user_agent = ? AND session = ?",
                'bind' => [Session::uagent_no_version(), COOKIE::get(REMEMBER_ME_COOKIE_NAME)]
            ]);
        }
        if (!$userSession) {
            return false;
        }
        else {
            return $userSession;
        }
    }
}
