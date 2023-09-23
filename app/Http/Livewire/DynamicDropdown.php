<?php

namespace App\Http\Livewire;

use App\Models\Kurir;
use Kavist\RajaOngkir\Facades\RajaOngkir;
use Livewire\Component;

class DynamicDropdown extends Component
{
    public $provinsi;
    public $kota;
    public $berat;
    public $jasa, $nama_jasa;
    public $options1;
    public $options2;
    public $options3;
    public $result = [];

    public function mount()
    {
        // Fetch data for Option 1
        $this->options1 = RajaOngkir::provinsi()->all();

        // Fetch data for Option 2 based on selected Option 1
        $this->options2 = RajaOngkir::kota()->dariProvinsi($this->provinsi)->get();

        $this->options3 = Kurir::all();
    }

    public function updateOptions2()
    {
        $this->options2 = RajaOngkir::kota()->dariProvinsi($this->provinsi)->get();
    }

    public function cekOngkir(){

        $cost = RajaOngkir::ongkosKirim([
            'origin' => 5, // kota asal
            'destination' => $this->provinsi, // kota tujuan
            'weight' => $this->berat, // berat (catatan eror, tidak bisa lebih dari 4 digit)
            'courier' => $this->jasa, // jasa
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
    }

    public function render()
    {
        return view('livewire.dynamic-dropdown');
    }
}
