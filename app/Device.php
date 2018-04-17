<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Datapoint;

class Device extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name', 'type', 'modelnumber', 'user_id'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function findDevices(){ //find all devices related to this user's id
        $user_id = auth()->user()->id;
        return static::selectRaw('name, type, modelnumber')
            ->where('user_id', $user_id)
            ->groupBy('name', 'type', 'modelnumber')
            ->get()
            ->toArray();
    }

    public function datapoints()
    {
        return $this->hasMany(Datapoint::class);
    }

    public function addDatapoint(Int $cases)
    {
        for ($i = 0; $i < $cases; $i++) { //iterate given num of cases
            $datapoint = Datapoint::create([ //create a datapoint with this device's id and random values
                'device_id' => $this->id,
                'gpm' => rand(1, 4),
                'psi' => rand(2, 8),
                'temperature' => rand(20, 30),
                'velocity' => rand(1, 3)
            ]);
            $this->datapoints()->save($datapoint); //save it in the database

        }
    }

    public static function returnAvg($dataSet)
    {
        $sum = 0;
        $counter = 0;

        foreach ($dataSet as $data){
            $sum = $sum + $data;
            $counter++;
        }

        $average = $sum/$counter;

        return dd($average);

        return $average;
    }

}
