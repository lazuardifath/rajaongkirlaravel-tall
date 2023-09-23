<div>
    <div class="container mx-auto flex flex-col md:flex-row items-center justify-center">
        <div class="m-4 p-4 bg-white dark:bg-gray-800 dark:border-gray-700 shadow-lg rounded-lg mb-4 md:mb-0 md:w-1/2 lg:w-1/2">
            <div class="form-group">
                <div class="py-4 px-4 mx-auto max-w-screen-xl text-center lg:py-4">
                    <h1
                        class="mb-2 text-xs font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-xl dark:text-white">
                        Cek Ongkir dari Jogja Kemana Aja!</h1>
                    <p class="mb-2 text-sm font-normal text-gray-500 lg:text-sm dark:text-gray-400">
                        Cek Ongkir dari Jogja ke seluruh indonesia cukup satu klik.</p>
                </div>
                <form wire:submit.prevent="cekOngkir">
                    <div>
                        <label for="provinsi"
                            class="block my-2 text-sm font-medium text-gray-900 dark:text-white">Provinsi
                            Tujuan</label>
                        <select name="provinsi" wire:model="provinsi" wire:change="updateOptions2" id="provinsi"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="0">Pilih Provinsi Tujuan</option>
                            @foreach ($options1 as $option)
                                <option value="{{ $option['province_id'] }}">{{ $option['province'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="kota" class="block my-2 text-sm font-medium text-gray-900 dark:text-white">Kota
                            Tujuan
                            Pengiriman</label>
                        <select name="kota" wire:model="kota" id="kota"
                            class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="">Kota Tujuan Pengiriman</option>
                            @foreach ($options2 as $option)
                                <option value="{{ $option['city_id'] }}">{{ $option['city_name'] }}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <div>
                            <label for="jasa"
                                class="block my-2 text-sm font-medium text-gray-900 dark:text-white">Provinsi
                                Tujuan</label>
                            <select name="jasa" wire:model="jasa" id="jasa"
                                class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Pilih kurir</option>
                                @forelse ($options3 as $courier)
                                    <option value="{{ $courier['code'] }}">{{ $courier['title'] }}</option>
                                @empty
                                    <option value="">Tidak ada kurir</option>
                                @endforelse
                            </select>
                        </div>
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <div>
                            <label for="jasa"
                                class="block my-2 text-sm font-medium text-gray-900 dark:text-white">Berat Kiriman
                                (gram)</label>
                            <input type="number" wire:model="berat" id="berat" name="berat"
                                class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Berat Kiriman (gram)" />
                        </div>
                    </div>
                    <button type="submit"
                        class="w-full focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 my-3 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Cek
                        Ongkir</button>
                </form>
            </div>
        </div>

        <div class="m-4 p-4 bg-white dark:bg-gray-800 dark:border-gray-700 shadow-lg rounded-lg md:w-1/2 lg:w-1/2">
            {{-- tampilkan menu ongkir (jika sudah submit) --}}
            <div id="alert-border-3"
                class="flex items-center p-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800"
                role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <div class="ml-3 text-sm font-medium">
                    Silahkan Masukkan Informasi yang dibutuhkan!
                </div>
                <button type="button"
                    class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                    data-dismiss-target="#alert-border-3" aria-label="Close">
                    <span class="sr-only">Dismiss</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
            @if ($result)
                <div class="flow-root">
                    <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                        @forelse ($result as $r)
                            <li class="py-3 sm:py-4">
                                <div class="flex items-center space-x-4">
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                            {{ $nama_jasa }}
                                        </p>
                                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                            <span class="bg-green-100 text-green-800 text-xs font-medium px-1 py-1.5 rounded dark:bg-green-900 dark:text-green-300">
                                                <?php
                                                    $etd_parts = explode(" ", $r['etd']);
                                                    echo $etd_parts[0]; // Output: 4-6
                                                ?> Hari </span>- {{ $r['description'] }}
                                        </p>
                                    </div>
                                    <div
                                        class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                        <span class="bg-green-100 text-green-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Rp. {{ number_format($r['biaya']) }}</span>
                                    </div>
                                </div>
                            </li>
                        @empty
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <div>
                                            <h5 class="dark:text-white">Tidak ada jasa pengiriman ke tujuan ini</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforelse
                    </ul>
                </div>
            @else
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body text-center">
                            <div>
                                <h5 class="dark:text-white">Belum ada pengecekan</h5>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
