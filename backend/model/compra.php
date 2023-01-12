<?php

class compra
{
private int $id;
private int $idUsuario;
private int $idProducto;
public int $cantidad;
public string $fechacompra;

    /**
     * @param int $id
     * @param int $idUsuario
     * @param int $idProducto
     * @param int $cantidad
     * @param string $fechacompra
     */
    public function __construct(int $id, int $idUsuario, int $idProducto, int $cantidad, string $fechacompra)
    {
        $this->id = $id;
        $this->idUsuario = $idUsuario;
        $this->idProducto = $idProducto;
        $this->cantidad = $cantidad;
        $this->fechacompra = $fechacompra;
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
    public function getIdProducto(): int
    {
        return $this->idProducto;
    }

    /**
     * @param int $idProducto
     */
    public function setIdProducto(int $idProducto): void
    {
        $this->idProducto = $idProducto;
    }

    /**
     * @return int
     */
    public function getCantidad(): int
    {
        return $this->cantidad;
    }

    /**
     * @param int $cantidad
     */
    public function setCantidad(int $cantidad): void
    {
        $this->cantidad = $cantidad;
    }

    /**
     * @return string
     */
    public function getFechacompra(): string
    {
        return $this->fechacompra;
    }

    /**
     * @param string $fechacompra
     */
    public function setFechacompra(string $fechacompra): void
    {
        $this->fechacompra = $fechacompra;
    }



}

