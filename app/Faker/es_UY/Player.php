<?php

namespace App\Faker\es_UY;

class Player extends \Faker\Provider\es_ES\Person
{
    protected static $firstNameMale = [
        'Agustín', 'Alan', 'Alejandro', 'Álvaro', 'Andrés', 'Antonio', 'Baltasar', 'Benjamín', 'Bruno', 'Camilo',
        'Carlos', 'Cristian', 'Damián', 'Daniel', 'Darío', 'David', 'Diego', 'Eduardo', 'Emiliano', 'Emilio',
        'Esteban', 'Facundo', 'Federico', 'Felipe', 'Fernando', 'Franco', 'Gabriel', 'Gastón', 'Gerardo', 'Gonzalo',
        'Guillermo', 'Ignacio', 'Javier', 'Joaquín', 'Jorge', 'José', 'José María', 'Juan', 'Juan Andrés', 'Juan Ignacio',
        'Juan Manuel', 'Juan Pablo', 'Kevin', 'Leandro', 'Leonardo', 'Lorenzo', 'Lucas', 'Luciano', 'Luis', 'Manuel',
        'Marcelo', 'Marco', 'Marcos', 'Martín', 'Mateo', 'Matías', 'Maximiliano', 'Miguel', 'Nicolás', 'Óscar',
        'Pablo', 'Patricio', 'Rafael', 'Ramiro', 'Raúl', 'Ricardo', 'Rodrigo', 'Rubén', 'Salvador', 'Samuel',
        'Santiago', 'Sebastián', 'Sergio', 'Tabaré', 'Tomás', 'Valentín', 'Vicente', 'Víctor', 'Washington', 'Wilson',
        'Yamandú',
    ];

    protected static $lastName = [
        'Abreu', 'Acosta', 'Aguiar', 'Álvarez', 'Amaral', 'Araujo', 'Barrios', 'Bentancur', 'Bianchi', 'Cabrera',
        'Cabrera Silva', 'Calzada', 'Cardozo', 'Castro', 'Cáceres', 'Correa', 'Da Silva', 'De León', 'Delgado', 'Díaz',
        'Domínguez', 'Duarte', 'Fernández', 'Ferreira', 'Flores', 'Forlán', 'Franco', 'García', 'Gómez', 'González',
        'Gutiérrez', 'Hernández', 'Lemos', 'López', 'Machado', 'Martínez', 'Medina', 'Méndez', 'Molina', 'Morales',
        'Moreno', 'Núñez', 'Olivera', 'Ortiz', 'Pereira', 'Pérez', 'Perdomo', 'Pintos', 'Ramírez', 'Recoba',
        'Reyes', 'Rivera', 'Rodríguez', 'Romero', 'Rossi', 'Ruiz', 'Sánchez', 'Santana', 'Silva', 'Sosa',
        'Suárez', 'Torres', 'Valdez', 'Valverde', 'Varela', 'Vega', 'Viera', 'Villar', 'Viña',
    ];

    public function lastName()
    {
        return static::numberBetween(1, 100) <= 75
            ? static::randomElement(static::$lastName).' '.static::randomElement(static::$lastName)
            : static::randomElement(static::$lastName);
    }
}