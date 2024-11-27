<?php

namespace App\Model;

use Symplefony\Model\Model;

class UserModel extends Model
{
    protected string $password;
    public function getPassword(): string
    {
        return $this->password;
    }
    public function setPassword(string $value): self
    {
        $this->password = $value;
        return $this;
    }

    protected string $email;
    public function getEmail(): string
    {
        return $this->email;
    }
    public function setEmail(string $value): self
    {
        $this->email = $value;
        return $this;
    }

    protected string $firstname;
    public function getFirstname(string $value): string
    {
        return $this->firstname;
    }
    public function setFirstname(string $value): self
    {
        $this->firstname = $value;
        return $this;
    }

    protected string $lastname;
    public function getLastname(): string
    {
        return $this->lastname;
    }
    public function setLastname(string $value): self
    {
        $this->lastname = $value;
        return $this;
    }

    protected string $phone_number;
    public function getPhone_number(): string
    {
        return $this->phone_number;
    }
    public function setPhone_number(string $value): self
    {
        $this->phone_number = $value;
        return $this;
    }
}
