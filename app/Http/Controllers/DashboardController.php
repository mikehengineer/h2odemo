<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Device;
use App\User;
use App\Datapoint;

class DashboardController extends Controller
{

    public $device = 1; //global device for graphing purposes

    public function __construct()
    {
        $this->middleware('auth')->except('generateChart');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function devices()
    {
        Device::findDevices();
        return view('pages.devices', compact('devices'));
    }

    public function storedevice()
    {
        $this->validate(request(), [
            'type' => 'required',
            'name' => 'required|unique:devices',
            'modelnumber' => 'required'
        ]);

        $user_id = Auth()->user()->id;
        if ($user_id == null){
            $user_id = 25;
        }

        Device::create([
            'type' => request('type'),
            'name' => request('name'),
            'modelnumber' => request('modelnumber'),
            'user_id' => $user_id
        ]);

        return redirect('/devices')->with('deviceMsg', 'Device added.');
    }

    public function deletedevice()
    {
        $device = request('nameDelete');
        $user_id = Auth()->user()->id;

        //dd('$device', 'user_id');
        Device::where('user_id', $user_id)
            ->where('name', $device)
            ->delete();

        return redirect('/devices');
    }

    public function addDatapoints()
    {

        $this->validate(request(), [
            'device' => 'required | integer',
            'datapoints' => 'required | integer'
        ]);

        $device = Device::find(request('device'));

        if ($device == null) {
            $notfound = 'Device not found.';
            return redirect('/home')->withErrors($notfound, 'notfound');
            }

        $datapoints = request('datapoints');
        $device->addDatapoint($datapoints);
        return redirect('/home')->with('deviceMsg', 'Datapoints added!');
    }


    public function settings()
    {
        return view('pages.settings');
    }

    public function advanced()
    {
        return view('pages.advanced');
    }

    public function documentation()
    {
        return view('pages.documentation');
    }

    public function home()
    {
        //get the last $datapoints worth of datapoints where device id = $device -> need gpm, psi, temperature, velocity
        if(request(['deviceGraph', 'datapointsGraph'])) {
            $device = request('deviceGraph');
            $datapoints = request('datapointsGraph');
            $chart = 1;

            $this->validate(request(), [
                'deviceGraph' => 'required | integer',
                'datapointsGraph' => 'required | integer | min:2'
            ]);

            $end = Datapoint::where('device_id', $device)->max('id');
            $start = $end - $datapoints;

            $gpm = Datapoint::where('device_id', $device)
                ->whereBetween('id', [$start, $end])
                ->get()
                ->pluck('gpm')
                ->toArray();

            $temperature = Datapoint::where('device_id', $device)
                ->whereBetween('id', [$start, $end])
                ->get()
                ->pluck('temperature')
                ->toArray();

            $velocity = Datapoint::where('device_id', $device)
                ->whereBetween('id', [$start, $end])
                ->get()
                ->pluck('velocity')
                ->toArray();

            $psi = Datapoint::where('device_id', $device)
                ->whereBetween('id', [$start, $end])
                ->get()
                ->pluck('psi')
                ->toArray();


            return view('pages.index', compact('device', 'datapoints', 'chart', 'gpm', 'temperature', 'velocity', 'psi'));
        }



        //$deviceGraph and $datapoints are showing up null at this point... need to work on it
        else{
            $device = 'null';
            $datapoints = 'null';
            $chart = 0;
        }


        return view('pages.index', compact('device', 'datapoints', 'chart'));
    }
}
