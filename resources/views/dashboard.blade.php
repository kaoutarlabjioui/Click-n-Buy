<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ClickNBuy - Tableau de bord</title>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.js"></script> -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script> -->
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-gray-100">
  <div class="flex h-screen overflow-hidden">
    <!-- Sidebar -->
    <div class="hidden md:flex md:flex-shrink-0">
      <div class="flex flex-col w-64 bg-gray-800">
        <div class="flex items-center justify-center h-16 bg-gray-900">
          <span class="text-white font-bold text-lg">ClickNBuy</span>
        </div>
        <div class="flex flex-col flex-grow px-4 py-4">
          <nav class="flex-1 space-y-2">
            <a href="" class="flex items-center px-4 py-2 text-white bg-gray-700 rounded-md">
              <i class="fas fa-home mr-3"></i>
              <span>Tableau de bord</span>
            </a>
            <a href="/admin/produits/showproduits" class="flex items-center px-4 py-2 text-gray-300 hover:bg-gray-700 rounded-md">
              <i class="fas fa-shopping-bag mr-3"></i>
              <span>Produits</span>
            </a>
            <a href="#" class="flex items-center px-4 py-2 text-gray-300 hover:bg-gray-700 rounded-md">
              <i class="fas fa-shopping-cart mr-3"></i>
              <span>Commandes</span>
            </a>
            <a href="#" class="flex items-center px-4 py-2 text-gray-300 hover:bg-gray-700 rounded-md">
              <i class="fas fa-users mr-3"></i>
              <span>Clients</span>
            </a>
            <a href="/admin/souscategories/showsouscategorie" class="flex items-center px-4 py-2 text-gray-300 hover:bg-gray-700 rounded-md">
              <i class="fas fa-chart-line mr-3"></i>
              <span>Souscategories</span>
            </a>
            <a href="/admin/categories/showCategorie" class="flex items-center px-4 py-2 text-gray-300 hover:bg-gray-700 rounded-md">
              <i class="fas fa-cog mr-3"></i>
              <span>Categorie</span>
            </a>
          </nav>
          <div class="mt-auto">
            <a href="/logout" class="flex items-center px-4 py-2 text-gray-300 hover:bg-gray-700 rounded-md">
              <i class="fas fa-sign-out-alt mr-3"></i>

              <span>{{ __('Log Out') }}</span>
            </a>
            <!-- <a href="/logout">
                                {{ __('Log Out') }}

                            </a> -->
            <!-- <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form> -->
            </div>


        </div>
      </div>
    </div>

    <!-- Main content -->
    <div class="flex flex-col flex-1 overflow-y-auto">
      <!-- Top navigation -->
      <header class="bg-white shadow">
        <div class="flex items-center justify-between px-6 py-3">
          <div class="flex items-center">
            <button class="text-gray-500 focus:outline-none md:hidden">
              <i class="fas fa-bars"></i>
            </button>
            <h1 class="ml-4 text-xl font-semibold">Tableau de bord</h1>
          </div>
          <div class="flex items-center">
            <div class="relative">
              <input type="text" placeholder="Rechercher..." class="w-64 px-4 py-2 text-gray-700 bg-gray-100 border rounded-md focus:outline-none focus:border-blue-500">
            </div>
            <button class="flex items-center ml-4 text-gray-500 focus:outline-none">
              <i class="fas fa-bell"></i>
              <span class="absolute top-0 right-0 w-2 h-2 mt-1 mr-2 bg-red-500 rounded-full"></span>
            </button>
            <div class="ml-4 relative">
              <button class="flex items-center focus:outline-none">
                <img class="w-8 h-8 rounded-full" src="/api/placeholder/32/32" alt="Profile">
              </button>
            </div>
          </div>
        </div>
      </header>

      <!-- Dashboard content -->
      <main class="flex-1 p-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
          <!-- Stat Cards -->
          <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
              <div class="p-3 rounded-full bg-blue-500 bg-opacity-10">
                <i class="fas fa-shopping-cart text-blue-500"></i>
              </div>
              <div class="ml-4">
                <p class="text-gray-500 text-sm">Ventes totales</p>
                <p class="text-2xl font-semibold">€24,780</p>
                <p class="text-green-500 text-sm"><i class="fas fa-arrow-up"></i> 12% depuis hier</p>
              </div>
            </div>
          </div>

          <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
              <div class="p-3 rounded-full bg-green-500 bg-opacity-10">
                <i class="fas fa-users text-green-500"></i>
              </div>
              <div class="ml-4">
                <p class="text-gray-500 text-sm">Nouveaux clients</p>
                <p class="text-2xl font-semibold">384</p>
                <p class="text-green-500 text-sm"><i class="fas fa-arrow-up"></i> 8% cette semaine</p>
              </div>
            </div>
          </div>

          <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
              <div class="p-3 rounded-full bg-yellow-500 bg-opacity-10">
                <i class="fas fa-box text-yellow-500"></i>
              </div>
              <div class="ml-4">
                <p class="text-gray-500 text-sm">Commandes</p>
                <p class="text-2xl font-semibold">842</p>
                <p class="text-green-500 text-sm"><i class="fas fa-arrow-up"></i> 5% ce mois</p>
              </div>
            </div>
          </div>

          <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
              <div class="p-3 rounded-full bg-purple-500 bg-opacity-10">
                <i class="fas fa-eye text-purple-500"></i>
              </div>
              <div class="ml-4">
                <p class="text-gray-500 text-sm">Visiteurs</p>
                <p class="text-2xl font-semibold">12,589</p>
                <p class="text-red-500 text-sm"><i class="fas fa-arrow-down"></i> 3% cette semaine</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Charts -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
          <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-lg font-semibold mb-4">Ventes mensuelles</h2>
            <canvas id="salesChart" height="200"></canvas>
          </div>

          <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-lg font-semibold mb-4">Produits les plus vendus</h2>
            <canvas id="productsChart" height="200"></canvas>
          </div>
        </div>
           @yield('content')

      </main>
    </div>
  </div>

  <script>
    // Sales Chart
    const salesCtx = document.getElementById('salesChart').getContext('2d');
    const salesChart = new Chart(salesCtx, {
      type: 'line',
      data: {
        labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Jun', 'Jul', 'Aoû', 'Sep', 'Oct', 'Nov', 'Déc'],
        datasets: [{
          label: 'Ventes (€)',
          data: [12500, 15000, 18000, 16500, 21000, 22500, 18500, 23000, 25500, 28000, 30000, 32500],
          borderColor: 'rgb(59, 130, 246)',
          backgroundColor: 'rgba(59, 130, 246, 0.1)',
          tension: 0.3,
          fill: true
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            display: false
          }
        },
        scales: {
          y: {
            beginAtZero: true,
            grid: {
              borderDash: [2, 4]
            }
          },
          x: {
            grid: {
              display: false
            }
          }
        }
      }
    });

    // Products Chart
    const productsCtx = document.getElementById('productsChart').getContext('2d');
    const productsChart = new Chart(productsCtx, {
      type: 'doughnut',
      data: {
        labels: ['Smartphones', 'Ordinateurs', 'Accessoires', 'Audio', 'Photo'],
        datasets: [{
          data: [35, 25, 20, 15, 5],
          backgroundColor: [
            'rgba(59, 130, 246, 0.8)',
            'rgba(16, 185, 129, 0.8)',
            'rgba(245, 158, 11, 0.8)',
            'rgba(139, 92, 246, 0.8)',
            'rgba(239, 68, 68, 0.8)'
          ],
          borderWidth: 0
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            position: 'bottom'
          }
        },
        cutout: '70%'
      }
    });
  </script>

</body>
</html>















