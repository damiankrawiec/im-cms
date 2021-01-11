<?php


class Security
{

    private $salt = '5Yc8ABwoG5N79A5';

    private $authToken = 'eb8NFyhjW6rZ93u';

    protected function getSalt() {

        return $this->salt;

    }
    protected function encode($data) {

        $encode = $data.$this->salt;

        return $encode;

    }
    protected function decode($data) {

        $decode = str_replace($this->salt, '', $data);

        return $decode;

    }
    public function getAuthToken() {

        return $this->authToken;

    }
}