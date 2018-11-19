<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Psy\Exception\ErrorException;

class Npsn
{
    public function insert($regNum, $pin, $name, $email, $phone, $address, $service)
    {
        // Masukkan data ke database
        try {
            $ngalam_npsn = DB::table('ngalam_npsn')->insert([
                'no_registrasi' => $regNum,
                'pin' => $pin,
                'nama_pemohon' => $name,
                'email_pemohon' => $email,
                'nohp_pemohon' => $phone,
                'alamat_pemohon' => $address,
                'jenis_layanan' => $service
            ]);
        } catch (QueryException $e) {
            return 99;
        }
    }

    public function select($regNum, $pin)
    {
        try {
            $ngalam_npsn = DB::select("select * from ngalam_npsn where no_registrasi = '$regNum' && pin = '$pin'");
            if ($ngalam_npsn == null) return null;
            return $ngalam_npsn[0];
        } catch (QueryException $e) {
            return null;
        }
    }

    public function update(Array $attr, $regNum, $pin)
    {
        if ($this->select($regNum, $pin)->status != null) return 88;
        // Masukkan data ke database
        try {
            $ngalam_npsn = DB::table('ngalam_npsn')
                    ->where('no_registrasi', $regNum)
                    ->where('pin', $pin)
                    ->update($attr);
        } catch (QueryException $e) {
            return 99;
        }
    }

}
