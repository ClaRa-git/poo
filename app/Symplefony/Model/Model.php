<?php

namespace Symplefony\Model;

abstract class Model
{
    protected int $id;
    public function getId(): int
    {
        return $this->id;
    }
    public function setId(int $value): self
    {
        $this->id = $value;
        return $this;
    }

    public function __construct(array $data = [])
    {
        /*
        Pattern "Hydrator"
        Automatise l'hydratation d'un objet à partir d'un tableau associatif donné par la bdd
        */
        foreach ($data as $column_name => $value) {
            // si le nom de la colonne ne correspond à aucune propriété
            if (!property_exists($this, $column_name)) continue;
            $this->$column_name = $value;
        }
    }
}
