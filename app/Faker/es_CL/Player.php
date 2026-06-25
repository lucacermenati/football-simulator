<?php

namespace App\Faker\es_CL;

class Player extends \Faker\Provider\es_ES\Person
{
    protected static $firstNameMale = [
        'Agustín', 'Alejandro', 'Alexis', 'Álvaro', 'Andrés', 'Angelo', 'Antonio', 'Benjamín', 'Branco', 'Brayan',
        'Bryan', 'Carlos', 'Cristián', 'Cristóbal', 'Daniel', 'Darío', 'David', 'Diego', 'Eduardo', 'Emiliano',
        'Enzo', 'Esteban', 'Eugenio', 'Fabián', 'Felipe', 'Fernando', 'Francisco', 'Gabriel', 'Gary', 'Gonzalo',
        'Guillermo', 'Ignacio', 'Iván', 'Javier', 'Jean', 'Joaquín', 'Jorge', 'José', 'José Luis', 'Juan',
        'Juan Carlos', 'Juan Pablo', 'Kevin', 'Leandro', 'Leonardo', 'Lucas', 'Luis', 'Manuel', 'Marcelo', 'Marco',
        'Marcos', 'Martín', 'Matías', 'Mauricio', 'Maximiliano', 'Miguel', 'Nicolás', 'Óscar', 'Pablo', 'Patricio',
        'Pedro', 'Raimundo', 'Raúl', 'Ricardo', 'Rodrigo', 'Sebastián', 'Sergio', 'Tomás', 'Vicente', 'Víctor',
    ];

    protected static $lastName = [
        'Acevedo', 'Aguilera', 'Alarcón', 'Araya', 'Arias', 'Ávalos', 'Astudillo', 'Bahamondes', 'Baeza', 'Barrientos',
        'Bravo', 'Bustamante', 'Cabrera', 'Campos', 'Canales', 'Cárdenas', 'Carrasco', 'Castillo', 'Castro', 'Contreras',
        'Cortés', 'Díaz', 'Domínguez', 'Espinoza', 'Figueroa', 'Flores', 'Fuentes', 'Gajardo', 'Gallardo', 'Garcés',
        'García', 'Garrido', 'Godoy', 'Gómez', 'González', 'Gutiérrez', 'Henríquez', 'Herrera', 'Hidalgo', 'Hormazábal',
        'Huerta', 'Isla', 'Jara', 'Lagos', 'Leiva', 'López', 'Maldonado', 'Marín', 'Martínez', 'Medel',
        'Medina', 'Mella', 'Méndez', 'Miranda', 'Montecinos', 'Morales', 'Muñoz', 'Navarrete', 'Núñez', 'Orellana',
        'Ortiz', 'Osorio', 'Palacios', 'Paredes', 'Parra', 'Pérez', 'Pizarro', 'Poblete', 'Riquelme', 'Rivera',
        'Rojas', 'Romero', 'Rubio', 'Salazar', 'Sánchez', 'Sanhueza', 'Sepúlveda', 'Silva', 'Soto', 'Tapia',
        'Toro', 'Torres', 'Valdés', 'Valenzuela', 'Vargas', 'Vásquez', 'Vidal', 'Villalobos', 'Yáñez', 'Zúñiga',
    ];

    public function lastName()
    {
        $first = static::randomElement(static::$lastName);

        if (static::numberBetween(1, 100) <= 85) {
            do {
                $second = static::randomElement(static::$lastName);
            } while ($second === $first);

            return $first . ' ' . $second;
        }

        return $first;
    }
}
