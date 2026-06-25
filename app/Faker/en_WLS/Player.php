<?php

namespace App\Faker\en_WLS;

class Player extends \Faker\Provider\en_GB\Person
{
    protected static $firstNameMaleWLS = [
        'Aaron', 'Aled', 'Alun', 'Ben', 'Callum', 'Cameron', 'Carwyn', 'Dafydd', 'Daniel', 'Dylan',
        'Efan', 'Ellis', 'Evan', 'Gareth', 'Gethin', 'Harri', 'Ieuan', 'Iestyn', 'Ioan', 'Iwan',
        'Jack', 'Jac', 'James', 'Joe', 'Kai', 'Lewis', 'Lloyd', 'Luke', 'Morgan', 'Owen',
        'Rhys', 'Ryan', 'Sam', 'Steffan', 'Tom', 'Trystan',
    ];

protected static $lastNameWLS = [
        'Benneth', 'Bevan', 'Bowen', 'Davies', 'Edwards', 'Ellis', 'Evans', 'Foulkes', 'George', 'Griffiths', 'Harries', 'Harris',
        'Hopkins', 'Howells', 'Hughes', 'Humphreys', 'James', 'Jenkins', 'John', 'Jones', 'Lewis', 'Llewellyn', 'Lloyd', 'Morgan',
        'Morris', 'Owen', 'Parry', 'Pearse', 'Phillips', 'Powell', 'Preece', 'Price', 'Pritchard', 'Prosser', 'Pugh', 'Rees', 'Richards',
        'Roberts', 'Rowlands', 'Thomas', 'Vaughan', 'Watkins', 'Williams', 'Wynne',
    ];

    public function firstName($gender = null)
    {
        if ($gender === static::GENDER_FEMALE || rand(1, 100) <= 60) {
            return parent::firstName($gender);
        }

        return static::randomElement(static::$firstNameMaleWLS);
    }

    public function lastName()
    {
        if (rand(1, 100) <= 60) {
            return parent::lastName();
        }

        return static::randomElement(static::$lastNameWLS);
    }
}
