<?php

namespace App\Faker\en_NIR;

class Player extends \Faker\Provider\en_GB\Person
{
    protected static $firstNameMaleNIR = [
        'Aaron', 'Adam', 'Andrew', 'Ben', 'Callum', 'Cameron', 'Charlie', 'Conor', 'Craig', 'Daniel',
        'Darren', 'David', 'Dylan', 'Ethan', 'Jack', 'Jamie', 'James', 'Joel', 'Jonny', 'Jordan',
        'Kyle', 'Lee', 'Lewis', 'Matthew', 'Michael', 'Nathan', 'Patrick', 'Reece', 'Ryan', 'Sam',
        'Sean', 'Shane', 'Steven', 'Thomas', 'William',
    ];

    protected static $lastNameNIR = [
        'Allen', 'Bell', 'Boyd', 'Brown', 'Burns', 'Campbell', 'Clarke', 'Collins', 'Connolly', 'Doherty',
        'Donnelly', 'Duffy', 'Ferguson', 'Graham', 'Hamilton', 'Henderson', 'Hughes', 'Irvine', 'Johnston', 'Kelly',
        'Kennedy', 'Lavery', 'Little', 'Loughran', 'Lynch', 'Magee', 'Martin', 'McAuley', 'McCann', 'McCormick',
        'McDonnell', 'McGinn', 'McGovern', 'McGuinness', 'McKenna', 'McLaughlin', 'McMillan', 'Moore', 'Morgan', 'Mullan',
        'Murphy', 'Murray', 'Neill', 'O’Kane', 'O’Neill', 'Quinn', 'Robinson', 'Smyth', 'Stewart', 'Thompson',
        'Wallace', 'Wilson',
    ];

    public function firstName($gender = null)
    {
        if ($gender === static::GENDER_FEMALE || rand(1, 100) <= 60) {
            return parent::firstName($gender);
        }

        return static::randomElement(static::$firstNameMaleNIR);
    }

    public function lastName()
    {
        if (rand(1, 100) <= 60) {
            return parent::lastName();
        }

        return static::randomElement(static::$lastNameNIR);
    }
}
