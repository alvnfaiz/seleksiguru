@extends('Admin.layout')
@section('title', 'Index Admin')
@section('content')
  <div class="mb-12 px-4 md:ml-4 mt-8">
    <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-white">
      <div class="rounded-t mb-0 px-4 py-3 border-0">
        <div class="flex flex-wrap items-center">
          <div class="relative w-full px-4 max-w-full flex-grow flex-1">
            <h3 class="font-semibold text-lg text-slate-700">
              Tambah Kriteria
            </h3>
          </div>

        </div>
      </div>
      <div class="block w-full overflow-x-auto p-8">
        <!-- Projects table -->
        <form method="POST" action="{{ route('admin.postKategori') }}">
          @csrf
          <div class="block my-4">
            <label for="name" class="text-small font-semibold">Nama</label>
            <input type="text"
              class="border-0 px-3 py-3 placeholder-slate-500 text-slate-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
              name="name" id="name" />
          </div>
          <div class="block my-4">
            <label for="kode" class="text-small font-semibold">Kode</label>
            <input type="text"
              class="border-0 px-3 py-3 placeholder-slate-500 text-slate-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
              name="kode" id="kode" />
          </div>
          <div class="block my-4">
            <label for="atribut" class="text-small font-semibold">Atribut</label>
            <select
              class="border-0 px-3 py-3 placeholder-slate-500 text-slate-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
              name="atribut" required>
              <option value="cost">Cost</option>
              <option value="benefit">Benefit</option>
            </select>
          </div>
          <button type="submit" class="p-4 bg-indigo-500 hover:bg-indigo-600 text-white rounded">Simpan</button>
        </form>
      </div>
    </div>
  </div>
@endsection
