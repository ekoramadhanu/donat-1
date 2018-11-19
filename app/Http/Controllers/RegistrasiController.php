<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Npsn;
use App\Penelitian;
use App\Captcha;

class RegistrasiController extends Controller
{

    public function index()
    {
        return view('registrasi');
    }

    public function action(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:100',
            'address' => 'required|max:200',
            'email' => 'required|email',
            'phone' => 'required|max:100',
            'services' => 'required|numeric|max:3'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Mohon masukkan data dengan benar');
        }

        $captcha = new Captcha();
        if ($captcha->check($request->input('g-recaptcha-response'))->success != 1) {
            return redirect()->back()->with('error', 'Terdeteksi sebagai robot');
        }

        // check data
        $name = $request->input('name');
        $address = $request->input('address');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $service = $request->input('services');

        if ($name != null &&
            $address != null &&
            $email != null &&
            $phone != null &&
            $service != null &&
            $service != 0
        ) {

            $regNum = '';
            $pin = '';

            // Generate no_pendaftaran
            $date = time();
            $regNum = $date.mt_rand();
            $lnRegNum = strlen($regNum);
            if ($lnRegNum > 11) {
                $regNum = substr($regNum, $lnRegNum-11);
            }
            // Generate pin
            $pin = $this->generateRandomString(11);

            // Jika data sukses dimasukkan di return ke view('registrasi_sukses')
            $serviceName = '';
            switch ($service) {
            case 1 :
                $serviceName = 'Penerbitan NPSN';
                $npsn = new Npsn();
                $this->grabDB($npsn, $regNum, $pin, $name, $email, $phone, $address, $service);
                break;
            case 2 :
                $serviceName = 'Rekomendasi Penelitian';
                $penelitian = new Penelitian();
                $this->grabDB($penelitian, $regNum, $pin, $name, $email, $phone, $address, $service);
                break;
            }

            return view('registrasi_sukses')->with([
                'serviceName' => $serviceName,
                'regNum' => $regNum,
                'pin' => $pin
            ]);
        }

        // if data invalid
        return redirect()->back()->with('error', 'Mohon masukkan data dengan benar');
    }

    public function generateRandomString($length)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function grabDB($obj, $regNum, $pin, $name, $email, $phone, $address, $service)
    {
        $data = $obj->insert($regNum, $pin, $name, $email, $phone, $address, $service);
        if ($data == 99) {
            return redirect()->back()->with('error', 'Mohon masukkan data dengan benar');
        }
    }
}
