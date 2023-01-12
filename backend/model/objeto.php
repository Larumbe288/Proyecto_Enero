<?php

class objeto
{
    private int $id;
    public string $nombre;
    public double $precio;
    public string $imagen1;
    public string $imagen2;
    public string $imagen3;
    public double $latitud;
    public double $longitud;
    private int $idCategoria;

    /**
     * @param int $id
     * @param string $nombre
     * @param float $precio
     * @param string $imagen1
     * @param string $imagen2
     * @param string $imagen3
     * @param float $latitud
     * @param float $longitud
     * @param int $idCategoria
     */
    public function __construct(int $id, string $nombre, float $precio, string $imagen1, string $imagen2 = null, string $imagen3 = null, float $latitud = null, float $longitud = null, int $idCategoria)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->imagen1 = $imagen1;
        $this->imagen2 = $imagen2;
        $this->imagen3 = $imagen3;
        $this->latitud = $latitud;
        $this->longitud = $longitud;
        $this->idCategoria = $idCategoria;
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
     * @return float
     */
    public function getPrecio(): float
    {
        return $this->precio;
    }

    /**
     * @param float $precio
     */
    public function setPrecio(float $precio): void
    {
        $this->precio = $precio;
    }

    /**
     * @return string
     */
    public function getImagen1(): string
    {
        return $this->imagen1;
    }

    /**
     * @param string $imagen1
     */
    public function setImagen1(string $imagen1): void
    {
        $this->imagen1 = $imagen1;
    }

    /**
     * @return string
     */
    public function getImagen2(): string
    {
        return $this->imagen2;
    }

    /**
     * @param string $imagen2
     */
    public function setImagen2(string $imagen2): void
    {
        $this->imagen2 = $imagen2;
    }

    /**
     * @return string
     */
    public function getImagen3(): string
    {
        return $this->imagen3;
    }

    /**
     * @param string $imagen3
     */
    public function setImagen3(string $imagen3): void
    {
        $this->imagen3 = $imagen3;
    }

    /**
     * @return float
     */
    public function getLatitud(): float
    {
        return $this->latitud;
    }

    /**
     * @param float $latitud
     */
    public function setLatitud(float $latitud): void
    {
        $this->latitud = $latitud;
    }

    /**
     * @return float
     */
    public function getLongitud(): float
    {
        return $this->longitud;
    }

    /**
     * @param float $longitud
     */
    public function setLongitud(float $longitud): void
    {
        $this->longitud = $longitud;
    }

    /**
     * @return int
     */
    public function getIdCategoria(): int
    {
        return $this->idCategoria;
    }

    /**
     * @param int $idCategoria
     */
    public function setIdCategoria(int $idCategoria): void
    {
        $this->idCategoria = $idCategoria;
    }


}