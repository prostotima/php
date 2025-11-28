<?php

require_once __DIR__ . '/User.php';

class Student extends User {
    private $group;

    public function getRole() {
        return "Студент";
    }

    public function getGroup() {
        return $this->group;
    }

    public function setGroup($group) {
        $this->group = $group;
    }
}
