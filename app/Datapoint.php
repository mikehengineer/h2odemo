<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Datapoint extends Model
{

    protected $fillable = ['gpm', 'psi', 'temperature', 'velocity', 'device_id'];

    public function devices()
    {
        $this->belongsTo(Device::class);
    }

    public function generateTestData(Int $cases){

        for ($i = 0; $i < $cases; $i++){
            Datapoint::create([
                'gpm' => rand(2, 8),
                'psi' => rand(1,7),
                'temperature' => rand(20, 30),
                'velocity' => rand(1,4)
            ]);
        }

    }

}
