<?php

namespace App\Faker\es_EC;

class Player extends \Faker\Provider\es_ES\Person
{
    protected static $firstNameMale = [
        'Álex', 'Alexander', 'Andrés', 'Ángel', 'Antonio', 'Brayan', 'Bryan', 'Camilo', 'Carlos', 'Carlos Andrés',
        'Carlos Alberto', 'Christian', 'Cristian', 'Daniel', 'Darío', 'David', 'Diego', 'Eduardo', 'Edwin', 'Elkin',
        'Emerson', 'Enrique', 'Erick', 'Esteban', 'Fabián', 'Felipe', 'Fernando', 'Francisco', 'Gabriel', 'Geovanny',
        'Gonzalo', 'Guillermo', 'Henry', 'Hugo', 'Isaac', 'Iván', 'Jairo', 'Javier', 'Jhon', 'Jhonatan',
        'Jorge', 'José', 'José Luis', 'José Francisco', 'Juan', 'Juan Carlos', 'Juan David', 'Juan José', 'Juan Pablo', 'Kevin',
        'Leonardo', 'Luis', 'Luis Fernando', 'Luis Miguel', 'Manuel', 'Marco', 'Mario', 'Martín', 'Mateo', 'Mauricio',
        'Michael', 'Miguel', 'Miguel Ángel', 'Nicolás', 'Óscar', 'Pablo', 'Pedro', 'Raúl', 'Ricardo', 'Roberto',
        'Rodrigo', 'Samuel', 'Santiago', 'Sebastián', 'Sergio', 'Steven', 'Víctor', 'Washington', 'Wilmer', 'Yerson',
    ];

    protected static $lastName = [
        'Acosta', 'Aguilar', 'Angulo', 'Arboleda', 'Ayoví', 'Banguera', 'Benítez', 'Borja', 'Cabezas', 'Caicedo',
        'Calderón', 'Cangá', 'Carabalí', 'Carrasco', 'Castillo', 'Chalá', 'Corozo', 'Cruz', 'Delgado', 'Escobar',
        'Espinoza', 'Estupiñán', 'Flores', 'García', 'Guamán', 'Guerrero', 'Hurtado', 'Ibarra', 'Intriago', 'Loor',
        'Mena', 'Méndez', 'Mina', 'Montero', 'Morales', 'Moreira', 'Mosquera', 'Nazareno', 'Noboa', 'Ordóñez',
        'Paredes', 'Perlaza', 'Porozo', 'Preciado', 'Quiñónez', 'Quintero', 'Ramírez', 'Reasco', 'Rodríguez', 'Segura',
        'Tenorio', 'Valencia', 'Vera', 'Villacrés', 'Zambrano',

        'Álvarez', 'Andrade', 'Araujo', 'Bermúdez', 'Bravo', 'Cabrera', 'Cedeño', 'Contreras', 'Díaz', 'Domínguez',
        'Fernández', 'Gómez', 'González', 'Herrera', 'Jiménez', 'López', 'Martínez', 'Medina', 'Moreno', 'Muñoz',
        'Navarro', 'Ortiz', 'Pacheco', 'Palacios', 'Peña', 'Pérez', 'Reyes', 'Rivas', 'Romero', 'Ruiz',
        'Salazar', 'Sánchez', 'Silva', 'Sosa', 'Suárez', 'Torres', 'Valdez', 'Vargas', 'Vásquez', 'Villacís',
    ];

    public function lastName()
    {
        return static::numberBetween(1, 100) <= 85
            ? static::randomElement(static::$lastName).' '.static::randomElement(static::$lastName)
            : static::randomElement(static::$lastName);
    }
}