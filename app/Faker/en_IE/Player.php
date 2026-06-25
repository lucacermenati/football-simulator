<?php

namespace App\Faker\en_IE;

class Player extends \Faker\Provider\en_GB\Person
{
    protected static $firstNameMaleIE = [
        'Adam', 'Aidan', 'Brian', 'Cian', 'Cillian', 'Conor', 'Darragh', 'David', 'Declan', 'Dylan',
        'Eoin', 'Fionn', 'Jack', 'James', 'Jamie', 'John', 'Kevin', 'Liam', 'Luke', 'Mark',
        'Michael', 'Nathan', 'Niall', 'Oisín', 'Patrick', 'Rian', 'Ronan', 'Ryan', 'Seán', 'Shane',
        'Tadhg', 'Thomas',
    ];

    protected static $lastNameIE = [
        'Barry', 'Boyle', 'Brennan', 'Brogan', 'Browne', 'Burke', 'Byrne', 'Callaghan', 'Carroll', 'Clarke',
        'Collins', 'Connolly', 'Daly', 'Doherty', 'Doyle', 'Duffy', 'Dunne', 'Fitzgerald', 'Flanagan', 'Flynn',
        'Gallagher', 'Hayes', 'Healy', 'Hogan', 'Kelly', 'Kennedy', 'Kenny', 'Lynch', 'Maguire', 'Maher',
        'McCarthy', 'McGrath', 'Molloy', 'Moore', 'Moran', 'Murphy', 'Murray', 'Nolan', 'O’Brien', 'O’Connor',
        'O’Donnell', 'O’Keefe', 'O’Neill', 'O’Reilly', 'O’Sullivan', 'Power', 'Quinn', 'Reilly', 'Ryan', 'Sheehan',
        'Walsh', 'Whelan',
    ];

    public function firstName($gender = null)
    {
        if ($gender === static::GENDER_FEMALE || rand(1, 100) <= 60) {
            return parent::firstName($gender);
        }

        return static::randomElement(static::$firstNameMaleIE);
    }

    public function lastName()
    {
        if (rand(1, 100) <= 60) {
            return parent::lastName();
        }

        return static::randomElement(static::$lastNameIE);
    }
}