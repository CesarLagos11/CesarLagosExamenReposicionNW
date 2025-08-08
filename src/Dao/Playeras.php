<?php

namespace Dao;

class Playeras extends Table
{
    /**
     * Obtiene todos los registros de la tabla playeras_con_causa.
     */
    public static function getAll()
    {
        $sqlstr = "SELECT * from playeras_con_causa;";
        return self::obtenerRegistros($sqlstr, []);
    }

    /**
     * Obtiene un registro por su ID.
     */
    public static function getById(int $id)
    {
        $sqlstr = "SELECT * from playeras_con_causa where id = :id;";
        return self::obtenerUnRegistro($sqlstr, ["id" => $id]);
    }

    /**
     * Inserta un nuevo registro.
     */
    public static function insertOne(array $data)
    {
        $sqlstr = "INSERT INTO playeras_con_causa (nombre_cliente, causa_apoyada, talla, diseño_favorito, email, pais, mensaje) VALUES (:nombre_cliente, :causa_apoyada, :talla, :diseño_favorito, :email, :pais, :mensaje);";
        return self::executeNonQuery(
            $sqlstr,
            [
                "nombre_cliente" => $data["nombre_cliente"],
                "causa_apoyada" => $data["causa_apoyada"],
                "talla" => $data["talla"],
                "diseño_favorito" => $data["diseño_favorito"],
                "email" => $data["email"],
                "pais" => $data["pais"],
                "mensaje" => $data["mensaje"],
            ]
        );
    }

    /**
     * Actualiza un registro existente.
     */
    public static function updateOne(int $id, array $data)
    {
        $sqlstr = "UPDATE playeras_con_causa SET nombre_cliente = :nombre_cliente, causa_apoyada = :causa_apoyada, talla = :talla, diseño_favorito = :diseño_favorito, email = :email, pais = :pais, mensaje = :mensaje WHERE id = :id;";
        return self::executeNonQuery(
            $sqlstr,
            [
                "nombre_cliente" => $data["nombre_cliente"],
                "causa_apoyada" => $data["causa_apoyada"],
                "talla" => $data["talla"],
                "diseño_favorito" => $data["diseño_favorito"],
                "email" => $data["email"],
                "pais" => $data["pais"],
                "mensaje" => $data["mensaje"],
                "id" => $id
            ]
        );
    }

    /**
     * Elimina un registro por su ID.
     */
    public static function deleteOne(int $id)
    {
        $sqlstr = "DELETE from playeras_con_causa where id = :id;";
        return self::executeNonQuery($sqlstr, ["id" => $id]);
    }
}
?>