<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Kavist\RajaOngkir\Facades\RajaOngkir;
use App\Models\Kurir;

class Ongkir extends Component
{

    public $provinsi;
    public $kabupaten=[];
    public $kota;

    public function mount()
    {
        $this->provinsi =  RajaOngkir::provinsi()->all();
        $this->kabupaten = [];
    }

    public function updatedProvinsi($provinsi)
    {
        $this->kabupaten = RajaOngkir::kota()->dariProvinsi($provinsi['province'])->get();
    }

    public function getOngkir()
    {
        $cost = RajaOngkir::ongkosKirim([
            'origin' => 55, // kota asal
            'destination' => $this->kabupaten, // kota tujuan
            'weight' => 1300, // berat (catatan eror, tidak bisa lebih dari 4 digit)
            'courier' => 'jne', // jasa
        ])->get();


        // mengambil nama jasa pengiriman
        $this->nama_jasa = $cost[0]['name'];

        // menyimpan deskripsi, biaya dan estimasi pengiriman ke array
        foreach ($cost[0]['costs'] as $row) {
            $this->result[] = array(
                'description' => $row['description'],
                'biaya' => $row['cost'][0]['value'],
                'etd' => $row['cost'][0]['etd'],
            );
        }

        return $this->result;
    }

    public function render()
    {
        return view('livewire.ongkir')->extends('components.layouts.app')->section('content');
    }
}
