<?php

class comentario
{
private int $id;
public string $texto;
private int $idUsuario;
private int $idObjeto;
private string $fecha;

    /**
     * @param int $id
     * @param string $texto
     * @param int $idUsuario
     * @param int $idObjeto
     * @param string $fecha
     */
    public function __construct(int $id, string $texto, int $idUsuario, int $idObjeto, string $fecha)
    {
        $this->id = $id;
        $this->texto = $texto;
        $this->idUsuario = $idUsuario;
        $this->idObjeto = $idObjeto;
        $this->fecha = $fecha;
    }

    /**
     * @return string
     */
    public function getFecha(): string
    {
        return $this->fecha;
    }

    /**
     * @param string $fecha
     */
    public function setFecha(string $fecha): void
    {
        $this->fecha = $fecha;
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
    public function getTexto(): string
    {
        return $this->texto;
    }

    /**
     * @param string $texto
     */
    public function setTexto(string $texto): void
    {
        $this->texto = $texto;
    }

    /**
     * @return int
     */
    public function getIdUsuario(): int
    {
        return $this->idUsuario;
    }

    /**
     * @param int $idUsuario
     */
    public function setIdUsuario(int $idUsuario): void
    {
        $this->idUsuario = $idUsuario;
    }

    /**
     * @return int
     */
    public function getIdObjeto(): int
    {
        return $this->idObjeto;
    }

    /**
     * @param int $idObjeto
     */
    public function setIdObjeto(int $idObjeto): void
    {
        $this->idObjeto = $idObjeto;
    }



}