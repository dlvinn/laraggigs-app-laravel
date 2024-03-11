<?php 
namespace App\Models;

class Listings {
    public static function all(){
        return [
            [
                'id' => 1,
                'title' => 'listing one',
                'description' => 'lorem ',
                
            ],
            [
                'id' => 2,
                'title' => 'listing two',
                'description' => 'lorem spsm',
                
            ]
            ];
    }
}
?>