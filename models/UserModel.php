<?php

class UserModel {

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $email;
    /**
     * @var string
     */
    private $password;
    /**
     * @return int
     */
    public function getId(): int{
        return $this->id;
    }
    /**
     * @param integer $value
     * @return UserModel
     */
    public function setId(int $value): UserModel{
        $this->id = $value;
        return $this;
    }
    /**
     * @return string
     */
    public function getName(): string{
        return $this->name;
    }
    /**
     * @param string $value
     * @return UserModel
     */
    public function setName(string $value): UserModel{
        $this->name = $value;
        return $this;
    }
    /**
     * @return string
     */
    public function getEmail(): string{
        return $this->email;
    }
    /**
     * @param string $value
     * @return UserModel
     */
    public function setEmail(string $value): UserModel{
        $this->email = $value;
        return $this;
    }
    /**
     * @return string
     */
    public function getPassword(): string{
        return $this->password;
    }
    /**
     * @param string $value
     * @return UserModel
     */
    public function setPassword(string $value): UserModel{
        $this->password = $value;
        return $this;
    }
    

}