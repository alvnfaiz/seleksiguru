<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="{{ asset('vendor/@fortawesome/css/all.min.css') }}" />

  @vite('resources/css/app.css')
</head>

<body class="antialiased">
  <nav
    class="md:left-0 md:block md:fixed md:top-0 md:bottom-0 md:overflow-y-auto md:flex-row md:flex-nowrap md:overflow-hidden shadow-xl bg-white flex flex-wrap items-center justify-between relative md:w-64 z-10 py-4 px-6">
    <div
      class="md:flex-col md:items-stretch md:min-h-full md:flex-nowrap px-0 flex flex-wrap items-center justify-between w-full mx-auto">
      <button
        class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent"
        type="button" onclick="toggleNavbar('example-collapse-sidebar')">
        <i class="fas fa-bars"></i>
      </button>
      <a class="md:block text-left md:pb-2 text-slate-600 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0"
        href="{{ route('admin.index') }}">
        Admin
      </a>
      <div
        class="md:flex md:flex-col md:items-stretch md:opacity-100 md:relative md:mt-4 md:shadow-none shadow absolute top-0 left-0 right-0 z-40 overflow-y-auto overflow-x-hidden h-auto items-center flex-1 rounded hidden"
        id="example-collapse-sidebar">
        <div class="md:min-w-full md:hidden block pb-4 mb-4 border-b border-solid border-slate-200">
          <div class="flex flex-wrap justify-between">

            <div class="">
              <button type="button"
                class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent"
                onclick="toggleNavbar('example-collapse-sidebar')">
                <i class="fas fa-times"></i>
              </button>
            </div>
            <div class="">
              <a class="md:block text-right md:pb-2 text-slate-600 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0"
                href="{{ route('admin.index') }}">
                Admin
              </a>
            </div>
          </div>
        </div>

        <!-- Heading -->
        <h6 class="md:min-w-full text-slate-500 text-xs uppercase font-bold block pt-1 pb-4 no-underline">
          Admin
        </h6>
        <!-- Navigation -->

        <ul class="md:flex-col md:min-w-full flex flex-col list-none">
          <li class="items-center">
            <a href="{{ route('admin.guru.index') }}"
              class="text-xs uppercase py-3 font-bold block text-pink-500 hover:text-pink-600">
              <i class="fas fa-user mr-2 text-sm opacity-75"></i>
              List Guru
            </a>
          </li>

          <li class="items-center">
            <a href="{{ route('admin.kategori') }}"
              class="text-xs uppercase py-3 font-bold block text-slate-700 hover:text-slate-500">
              <i class="fas fa-list mr-2 text-sm text-slate-500"></i>
              Kriteria
            </a>
          </li>

          <li class="items-center">
            <a href="{{ route('admin.user') }}"
              class="text-xs uppercase py-3 font-bold block text-slate-700 hover:text-slate-500">
              <i class="fas fa-users mr-2 text-sm text-slate-500"></i>
              User
            </a>
          </li>

          <li class="items-center">
            <a href="{{ route('admin.ahp') }}"
              class="text-xs uppercase py-3 font-bold block text-slate-700 hover:text-slate-500">
              <i class="fas fa-table mr-2 text-sm text-slate-500"></i>
              AHP
            </a>
          </li>

          <li class="items-center">
            <a href="{{ route('admin.topsis') }}"
              class="text-xs uppercase py-3 font-bold block text-slate-700 hover:text-slate-500">
              <i class="fas fa-database mr-2 text-sm text-slate-500"></i>
              Topsis
            </a>
          </li>

          <li class="items-center">
            <a href="{{ route('admin.copeland') }}"
              class="text-xs uppercase py-3 font-bold block text-slate-700 hover:text-slate-500">
              <i class="fas fa-sort mr-2 text-sm text-slate-500"></i>
              Copeland
            </a>
          </li>
        </ul>

        <!-- Divider -->
        <hr class="my-4 md:min-w-full" />
        <!-- Heading -->
        <h6 class="md:min-w-full text-slate-500 text-xs uppercase font-bold block pt-1 pb-4 no-underline">
          Authentication
        </h6>
        <!-- Navigation -->

        <ul class="md:flex-col md:min-w-full flex flex-col list-none md:mb-4">
          <li class="items-center">
            <form method="POST" action="{{ route('logout') }}">
              <button type="submit" class="text-slate-700 hover:text-red-500 text-xs uppercase py-3 font-bold block">
                <i class="fas fa-door-open text-slate-500 mr-2 text-sm"></i>
                Logout
              </button>
            </form>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div>
    @yield('content')
  </div>
  <script>
    function toggleNavbar(collapseID) {
      document.getElementById(collapseID).classList.toggle("hidden");
      document.getElementById(collapseID).classList.toggle("bg-white");
      document.getElementById(collapseID).classList.toggle("m-2");
      document.getElementById(collapseID).classList.toggle("py-3");
      document.getElementById(collapseID).classList.toggle("px-6");
    }
  </script>
</body>

</html>
