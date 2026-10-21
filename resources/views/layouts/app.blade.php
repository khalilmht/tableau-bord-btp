<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord BTP</title>

    <!-- CSS Bootstrap 4.6 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    
    <!-- FontAwesome pour les icônes BTP -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    @livewireStyles
</head>
<body class="bg-light">

    <!-- Barre de navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container-fluid">
            <a class="navbar-brand font-weight-bold" href="#">
                <i class="fas fa-hard-hat mr-2"></i>BTP Manager
            </a>
        </div>
    </nav>

    <!-- Contenu principal -->
    <main class="container-fluid">
        {{ $slot ?? $children ?? '' }}
        @yield('content')
    </main>

    <!-- Scripts Bootstrap (jQuery + Popper + Bootstrap JS) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    @livewireScripts
</body>
</html>