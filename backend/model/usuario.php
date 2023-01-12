<?php

class usuario
{
private int $id;
public string $correo;
public string $nombre;
public string $telefono;
public double $christokens;
private string $password;
public string $rol;

    /**
     * @param int $id
     * @param string $correo
     * @param string $nombre
     * @param string $telefono
     * @param float $christokens
     * @param string $password
     * @param string $rol
     */
    public function __construct(int $id, string $correo, string $nombre, string $telefono, float $christokens, string $password, string $rol)
    {
        $this->id = $id;
        $this->correo = $correo;
        $this->nombre = $nombre;
        $this->telefono = $telefono;
        $this->christokens = $christokens;
        $this->password = $password;
        $this->rol = $rol;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getCorreo(): string
    {
        return $this->correo;
    }

    /**
     * @param string $correo
     */
    public function setCorreo(string $correo): void
    {
        $this->correo = $correo;
    }

    /**
     * @return string
     */
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * @param string $nombre
     */
    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    /**
     * @return string
     */
    public function getTelefono(): string
    {
        return $this->telefono;
    }

    /**
     * @param string $telefono
     */
    public function setTelefono(string $telefono): void
    {
        $this->telefono = $telefono;
    }

    /**
     * @return float
     */
    public function getChristokens(): float
    {
        return $this->christokens;
    }

    /**
     * @param float $christokens
     */
    public function setChristokens(float $christokens): void
    {
        $this->christokens = $christokens;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getRol(): string
    {
        return $this->rol;
    }

    /**
     * @param string $rol
     */
    public function setRol(string $rol): void
    {
        $this->rol = $rol;
    }

}