<?php

namespace App\Faker\en_SCT;

class Player extends \Faker\Provider\en_GB\Person
{
    protected static $firstNameMaleSCT = [
        'Aaron', 'Adam', 'Alasdair', 'Andrew', 'Archie', 'Ben', 'Blair', 'Callum', 'Cameron', 'Charlie',
        'Connor', 'Craig', 'Daniel', 'David', 'Dylan', 'Euan', 'Finlay', 'Fraser', 'Gregor', 'Hamish',
        'Harry', 'Jack', 'Jamie', 'John', 'Kieran', 'Kyle', 'Lachlan', 'Lewis', 'Logan', 'Malcolm',
        'Martin', 'Mason', 'Nathan', 'Oliver', 'Owen', 'Reece', 'Rhys', 'Robbie', 'Ross', 'Ryan',
        'Scott', 'Sean', 'Stuart', 'Thomas', 'William',
    ];

    protected static $lastNameSCT = [
        'Adam', 'Anderson', 'Armstrong', 'Bain', 'Black', 'Boyd', 'Brown', 'Bruce', 'Buchanan', 'Cameron',
        'Campbell', 'Clark', 'Davidson', 'Dawson', 'Dickson', 'Docherty', 'Douglas', 'Duncan', 'Ferguson', 'Forbes',
        'Fraser', 'Gibson', 'Gordon', 'Graham', 'Grant', 'Gray', 'Hamilton', 'Henderson', 'Hunter', 'Johnston',
        'Kelly', 'Kennedy', 'Kerr', 'King', 'MacDonald', 'MacGregor', 'MacKenzie', 'MacLean', 'MacLeod', 'MacMillan',
        'Marshall', 'Martin', 'McDonald', 'McGregor', 'McIntosh', 'McKay', 'McKenzie', 'McLean', 'McLeod', 'Miller',
        'Mitchell', 'Morrison', 'Murray', 'O\'Brien', 'O\'Donnell', 'O\'Sullivan', 'Paterson', 'Reid', 'Robertson', 'Ross', 'Russell', 'Scott', 'Smith',
        'Stewart', 'Taylor', 'Thomson', 'Walker', 'Wallace', 'Watson', 'Wilson', 'Young',
    ];

    public function firstName($gender = null)
    {
        if ($gender === static::GENDER_FEMALE || rand(1, 100) <= 60) {
            return parent::firstName($gender);
        }

        return static::randomElement(static::$firstNameMaleSCT);
    }

    public function lastName()
    {
        if (rand(1, 100) <= 60) {
            return parent::lastName();
        }

        return static::randomElement(static::$lastNameSCT);
    }
}