<?php

namespace App\Model;

use PDO;
use Symplefony\Database;
use Symplefony\Model\Model;

class UserModel extends Model
{
    private const TABLE_NAME = 'users';

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

    protected string $first_name;
    public function getFirstname(): string
    {
        return $this->first_name;
    }
    public function setFirstname(string $value): self
    {
        $this->first_name = $value;
        return $this;
    }

    protected string $last_name;
    public function getLastname(): string
    {
        return $this->last_name;
    }
    public function setLastname(string $value): self
    {
        $this->last_name = $value;
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

    /*
    CRUD : Create
    */
    public static function create(self $user): ?self
    {
        $query = sprintf(
            'INSERT INTO %s (`email`, `password`, `first_name`, `last_name`, `phone_number`)
             VALUES (:email, :password, :first_name, :last_name, :phone_number)',
            self::TABLE_NAME
        );

        $sth = Database::getPDO()->prepare($query);

        // Si la requête a échoué, on retourne null
        if (!$sth) return null;

        $success =
            $sth->execute([
                'email' => $user->getEmail(),
                'password' => $user->getPassword(),
                'first_name' => $user->getFirstname(),
                'last_name' => $user->getLastname(),
                'phone_number' => $user->getPhone_number()
            ]);

        if (!$success) return null;

        // Ajout de l'ID généré par la BDD
        $user->setId(Database::getPDO()->lastInsertId());

        return $user;
    }

    public static function readOne(int $id): ?self
    {
        $query = sprintf(
            "
        SELECT * FROM %s WHERE `id` = :id",
            self::TABLE_NAME
        );

        $sth = Database::getPDO()->prepare($query);

        if (!$sth) return null;

        $success =
            $sth->execute(
                [
                    'id' => $id
                ]
            );

        if (!$success) return null;

        $data = $sth->fetch();

        if (!$data) return null;

        return new self($data);
    }
}
