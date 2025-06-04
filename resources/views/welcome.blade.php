<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menara - Portail Entreprise de Recrutement</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .hero-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%234299e1' fill-opacity='0.1' fill-rule='evenodd'/%3E%3C/svg%3E");
        }

        .testimonial-card {
            transition: transform 0.3s ease;
        }

        .testimonial-card:hover {
            transform: translateY(-5px);
        }

        .feature-card {
            transition: all 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .process-card {
            transition: all 0.3s ease;
        }

        .process-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        .faq-item {
            transition: all 0.2s ease;
        }

        .faq-item:hover {
            background-color: #f9fafb;
        }

        #mobile-menu {
            position: absolute;
            top: calc(100% + 0.5rem);
            width: 100%;
            /* Ensure it's above everything */
            background: white;
            /* Solid background */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        #mobile-menu.hidden {
            display: none;
        }

        #mobile-menu a {
            padding: 12px 0;
            border-bottom: 1px solid #f0f0f0;
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800">
    <!-- Header -->
    <!-- Header -->
    <header class="bg-white shadow-md sticky top-0 z-50">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <div class="flex items-center">
                <img id="profile-image-preview" src="{{ asset('logo_transparent.png') }}" alt="Profile" class=" h-16 object-cover ">

                <h1 class="ml-3 text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-indigo-700">Menara</h1>
            </div>
            <nav class="hidden md:flex space-x-8">
                <a href="#" class="font-medium text-gray-700 hover:text-blue-600 transition-colors">Accueil</a>
                <a href="#how-it-works" class="font-medium text-gray-700 hover:text-blue-600 transition-colors">Comment ça marche</a>
                <a href="#features" class="font-medium text-gray-700 hover:text-blue-600 transition-colors">Avantages</a>
                <a href="#testimonials" class="font-medium text-gray-700 hover:text-blue-600 transition-colors">Témoignages</a>
                <a href="#faq" class="font-medium text-gray-700 hover:text-blue-600 transition-colors">FAQ</a>
            </nav>
            <div class="flex items-center space-x-4">
                <a href="{{route('login')}}" class="hidden md:inline-block font-medium text-blue-600 hover:text-blue-700">Connexion</a>
                <a href="{{route('companyregister')}}" class="hidden md:inline-block bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-medium py-2 px-4 rounded-lg shadow-md hover:shadow-lg transition-all">S'inscrire</a>
            </div>
            <button class="md:hidden text-gray-700 focus:outline-none" id="menu-toggle">
                <i class="fas fa-bars text-2xl"></i>
            </button>
        </div>

        <!-- Mobile Menu (Hidden by default) -->
        <div class="bg-white shadow-md hidden" id="mobile-menu">
            <div class="container mx-auto px-4 py-3 space-y-3">
                <a href="{{route('companyregister')}}" class="block font-medium text-blue-600 hover:text-blue-700 py-2">S'inscrire</a>
                <a href="{{route('login')}}" class="block font-medium text-blue-600 hover:text-blue-700 py-2">Connexion</a>
            </div>
        </div>
    </header>



    <!-- Hero Section -->
    <section class="py-20 bg-gradient-to-br from-blue-600 via-indigo-600 to-indigo-800 text-white hero-pattern relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-full bg-black opacity-10"></div>
        <div class="container mx-auto px-4 flex flex-col md:flex-row items-center relative z-10">
            <div class="md:w-1/2 mb-10 md:mb-0">
                <h2 class="text-4xl md:text-5xl font-bold mb-6 leading-tight">Recrutez les <span class="bg-clip-text text-transparent bg-gradient-to-r from-yellow-400 to-yellow-200">meilleurs talents</span> avec Menara</h2>
                <p class="text-xl mb-8 text-blue-500">Publiez vos offres d'emploi, recevez des rapports détaillés sur les candidats et optimisez votre processus de recrutement.</p>
                <div class="flex flex-wrap">
                    <a href="{{route('companyregister')}}" class="bg-white text-blue-700 hover:bg-gray-100 font-bold py-3 px-6 rounded-lg mr-4 mb-4 md:mb-0 shadow-lg hover:shadow-xl transition-all transform hover:-translate-y-1">
                        <i class="fas fa-user-plus mr-2"></i>Créer un compte entreprise
                    </a>
                    <a href="#how-it-works" class="bg-transparent border-2 border-white hover:bg-white hover:text-blue-700 text-white font-bold py-3 px-6 rounded-lg transition-all transform hover:-translate-y-1">
                        <i class="fas fa-info-circle mr-2"></i>Comment ça marche
                    </a>
                </div>
            </div>
            <div class="md:w-1/2 flex justify-center">
                <div class="relative">
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-pink-600 to-purple-600 rounded-lg blur opacity-75"></div>
                    <img src="https://th.bing.com/th/id/R.ab6d5e968f97361bd87797f61278bc50?rik=Z4sgGszd3D92uw&riu=http%3a%2f%2fwww.entreprise20.fr%2fwp-content%2fuploads%2f2019%2f10%2frecrutement-des-employ%c3%a9s.jpg&ehk=r9KojIq3YdmVxDiZs83IxEWRbPBCzEOdTLvHSqtXDMs%3d&risl=&pid=ImgRaw&r=0" alt="Recrutement" class="relative rounded-lg shadow-2xl transform md:rotate-3  max-w-lg object-cover" width="400px" height="200px">
                </div>
            </div>
        </div>

        <!-- Wave SVG -->
        <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none">
            <svg class="relative block w-full h-16" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V120H0V0C0,0,62.83,85.94,321.39,56.44Z" fill="#ffffff"></path>
            </svg>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="p-6 text-center">
                    <p class="text-4xl font-bold text-blue-600">98%</p>
                    <p class="text-gray-600 mt-2">Taux de satisfaction</p>
                </div>
                <div class="p-6 text-center">
                    <p class="text-4xl font-bold text-blue-600">500+</p>
                    <p class="text-gray-600 mt-2">Entreprises partenaires</p>
                </div>
                <div class="p-6 text-center">
                    <p class="text-4xl font-bold text-blue-600">10K+</p>
                    <p class="text-gray-600 mt-2">Recrutements réussis</p>
                </div>
                <div class="p-6 text-center">
                    <p class="text-4xl font-bold text-blue-600">40%</p>
                    <p class="text-gray-600 mt-2">Temps économisé</p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section id="how-it-works" class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h6 class="text-blue-600 font-semibold uppercase tracking-wider mb-2">Processus</h6>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Comment ça marche</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">Notre plateforme simplifie votre processus de recrutement en quatre étapes simples.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="p-6 bg-white border border-gray-200 rounded-xl hover:shadow-lg transition-shadow text-center process-card">
                    <div class="text-blue-600 text-4xl mb-4 flex justify-center">
                        <div class="h-20 w-20 bg-blue-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-user-plus"></i>
                        </div>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">1. Inscrivez votre entreprise</h3>
                    <p class="text-gray-600">Créez un compte entreprise et configurez votre profil avec vos besoins spécifiques.</p>
                </div>

                <div class="p-6 bg-white border border-gray-200 rounded-xl hover:shadow-lg transition-shadow text-center process-card">
                    <div class="text-blue-600 text-4xl mb-4 flex justify-center">
                        <div class="h-20 w-20 bg-blue-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-briefcase"></i>
                        </div>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">2. Publiez vos offres</h3>
                    <p class="text-gray-600">Créez et publiez des offres d'emploi détaillées avec les compétences requises pour chaque poste.</p>
                </div>

                <div class="p-6 bg-white border border-gray-200 rounded-xl hover:shadow-lg transition-shadow text-center process-card">
                    <div class="text-blue-600 text-4xl mb-4 flex justify-center">
                        <div class="h-20 w-20 bg-blue-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-comments"></i>
                        </div>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">3. Suivi des entretiens</h3>
                    <p class="text-gray-600">Notre équipe assigne les entretiens aux recruteurs spécialisés dans votre secteur d'activité.</p>
                </div>

                <div class="p-6 bg-white border border-gray-200 rounded-xl hover:shadow-lg transition-shadow text-center process-card">
                    <div class="text-blue-600 text-4xl mb-4 flex justify-center">
                        <div class="h-20 w-20 bg-blue-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-chart-bar"></i>
                        </div>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">4. Recevez des rapports</h3>
                    <p class="text-gray-600">Accédez à des rapports détaillés sur les candidats évalués pour prendre des décisions éclairées.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h6 class="text-blue-600 font-semibold uppercase tracking-wider mb-2">Avantages</h6>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Pourquoi choisir Menara?</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">Découvrez comment notre plateforme peut transformer votre processus de recrutement.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-gradient-to-br from-white to-blue-50 p-8 rounded-xl shadow-md feature-card">
                    <div class="text-blue-600 text-4xl mb-4">
                        <i class="fas fa-bullseye"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Recrutement ciblé</h3>
                    <p class="text-gray-600">Nos recruteurs spécialisés évaluent les compétences techniques et transversales spécifiques à votre secteur pour trouver les candidats parfaitement adaptés à vos besoins.</p>
                </div>

                <div class="bg-gradient-to-br from-white to-blue-50 p-8 rounded-xl shadow-md feature-card">
                    <div class="text-blue-600 text-4xl mb-4">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Gain de temps</h3>
                    <p class="text-gray-600">Réduisez de 40% le temps consacré aux entretiens préliminaires et concentrez vos ressources sur les candidats les plus prometteurs pour votre entreprise.</p>
                </div>

                <div class="bg-gradient-to-br from-white to-blue-50 p-8 rounded-xl shadow-md feature-card">
                    <div class="text-blue-600 text-4xl mb-4">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Rapports détaillés</h3>
                    <p class="text-gray-600">Accédez à des évaluations complètes pour chaque candidat avec des scores précis sur les compétences clés et des recommandations personnalisées.</p>
                </div>

                <div class="bg-gradient-to-br from-white to-blue-50 p-8 rounded-xl shadow-md feature-card">
                    <div class="text-blue-600 text-4xl mb-4">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Expertise spécialisée</h3>
                    <p class="text-gray-600">Notre réseau de recruteurs experts couvre tous les secteurs d'activité et possède une connaissance approfondie des compétences recherchées.</p>
                </div>

                <div class="bg-gradient-to-br from-white to-blue-50 p-8 rounded-xl shadow-md feature-card">
                    <div class="text-blue-600 text-4xl mb-4">
                        <i class="fas fa-database"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Analyse de données</h3>
                    <p class="text-gray-600">Profitez de tableaux de bord analytiques pour suivre vos performances de recrutement et identifier des tendances utiles.</p>
                </div>

                <div class="bg-gradient-to-br from-white to-blue-50 p-8 rounded-xl shadow-md feature-card">
                    <div class="text-blue-600 text-4xl mb-4">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Support dédié</h3>
                    <p class="text-gray-600">Bénéficiez d'un accompagnement personnalisé avec un conseiller dédié pour optimiser votre stratégie de recrutement.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Company Showcase Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h6 class="text-blue-600 font-semibold uppercase tracking-wider mb-2">Références</h6>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Ils nous font confiance</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">Rejoignez les entreprises leaders qui transforment leur recrutement avec Menara.</p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-5 gap-8 items-center">
                <div class="p-4 flex justify-center">
                    <img src="https://q8i4i8g7.delivery.rocketcdn.me/wp-content/uploads/2020/10/99gen_towers.png" alt="Logo entreprise" class="h-12 opacity-60 hover:opacity-100 transition-opacity grayscale hover:grayscale-0">
                </div>
                <div class="p-4 flex justify-center">
                    <img src="https://media.istockphoto.com/id/1412438498/vector/modern-square-tech-logo-design.jpg?s=612x612&w=0&k=20&c=ajxrQbCRK-HCeVE9kPMKqGCNnzoRS6UAJfstNKXWwTU=" alt="Logo entreprise" class="h-12 opacity-60 hover:opacity-100 transition-opacity grayscale hover:grayscale-0">
                </div>
                <div class="p-4 flex justify-center">
                    <img src="https://q8i4i8g7.delivery.rocketcdn.me/wp-content/uploads/2020/10/99gen_circle.png" alt="Logo entreprise" class="h-12 opacity-60 hover:opacity-100 transition-opacity grayscale hover:grayscale-0">
                </div>
                <div class="p-4 flex justify-center">
                    <img src="https://pbs.twimg.com/media/EeADav3UwAATZPd.png" alt="Logo entreprise" class="h-12 opacity-60 hover:opacity-100 transition-opacity grayscale hover:grayscale-0">
                </div>
                <div class="p-4 flex justify-center">
                    <img src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/i/356c66bd-fc11-4003-b39c-4785fd48c745/d90u1co-b0a0bae6-d30e-4d72-af0e-9ac7ebbd7c35.png" alt="Logo entreprise" class="h-12 opacity-60 hover:opacity-100 transition-opacity grayscale hover:grayscale-0">
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section id="testimonials" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h6 class="text-blue-600 font-semibold uppercase tracking-wider mb-2">Témoignages</h6>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Ce que nos clients disent</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">Découvrez comment Menara a transformé le processus de recrutement de ces entreprises.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="p-8 bg-gradient-to-br from-white to-blue-50 rounded-xl shadow-md testimonial-card">
                    <div class="flex items-center mb-6">
                        <div class="h-14 w-14 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-full flex items-center justify-center text-white text-xl font-bold">
                            AB
                        </div>
                        <div class="ml-4">
                            <p class="font-bold text-gray-900">Ahmed Benjelloun</p>
                            <p class="text-blue-600">DRH, MarocTech</p>
                        </div>
                    </div>
                    <p class="text-gray-700 italic mb-4">"Grâce à Menara, nous avons réduit notre temps de recrutement de 40%. Les rapports détaillés nous aident à prendre des décisions plus éclairées et à trouver des candidats qui correspondent parfaitement à notre culture d'entreprise."</p>
                    <div class="flex text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>

                <div class="p-8 bg-gradient-to-br from-white to-blue-50 rounded-xl shadow-md testimonial-card">
                    <div class="flex items-center mb-6">
                        <div class="h-14 w-14 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-full flex items-center justify-center text-white text-xl font-bold">
                            LA
                        </div>
                        <div class="ml-4">
                            <p class="font-bold text-gray-900">Laila Alaoui</p>
                            <p class="text-blue-600">Responsable Recrutement, FinancePlus</p>
                        </div>
                    </div>
                    <p class="text-gray-700 italic mb-4">"La qualité des évaluations techniques nous a permis d'identifier rapidement les candidats qui correspondent vraiment à nos besoins. L'interface est intuitive et le support client exceptionnel."</p>
                    <div class="flex text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>

                <div class="p-8 bg-gradient-to-br from-white to-blue-50 rounded-xl shadow-md testimonial-card">
                    <div class="flex items-center mb-6">
                        <div class="h-14 w-14 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-full flex items-center justify-center text-white text-xl font-bold">
                            KT
                        </div>
                        <div class="ml-4">
                            <p class="font-bold text-gray-900">Karim Tazi</p>
                            <p class="text-blue-600">CEO, Startup Innovation</p>
                        </div>
                    </div>
                    <p class="text-gray-700 italic mb-4">"En tant que startup, nous n'avions pas les ressources pour gérer efficacement notre recrutement. Menara nous a fourni l'expertise dont nous avions besoin pour constituer une équipe performante."</p>
                    <div class="flex text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-20 bg-gradient-to-r from-blue-600 to-indigo-700 text-white relative overflow-hidden">
        <div class="absolute top-0 right-0 w-1/3 h-full opacity-10">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" fill="white">
                <circle cx="25" cy="25" r="20" />
                <circle cx="75" cy="75" r="20" />
            </svg>
        </div>
        <div class="container mx-auto px-4 text-center relative z-10">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Prêt à transformer votre processus de recrutement?</h2>
            <p class="text-xl mb-8 max-w-2xl mx-auto">Créez votre compte entreprise dès aujourd'hui</p>
            <a href="{{route('companyregister')}}" class="bg-white text-blue-700 hover:bg-gray-100 font-bold py-3 px-8 rounded-lg shadow-md hover:shadow-lg transition-all">Créer un compte maintenant</a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-10">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">Menara</h3>
                    <p class="text-gray-400">Plateforme de gestion des entretiens de recrutement pour les entreprises.</p>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4">Liens rapides</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white">Accueil</a></li>
                        <li><a href="#how-it-works" class="text-gray-400 hover:text-white">Comment ça marche</a></li>
                        <li><a href="#features" class="text-gray-400 hover:text-white">Avantages</a></li>
                        <li><a href="#testimonials" class="text-gray-400 hover:text-white">Témoignages</a></li>
                        <li><a href="#faq" class="text-gray-400 hover:text-white">FAQ</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4">Contact</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li><i class="fas fa-envelope mr-2"></i> entreprises@menara.com</li>
                        <li><i class="fas fa-phone mr-2"></i> +212 522 000 000</li>
                        <li><i class="fas fa-map-marker-alt mr-2"></i> Casablanca, Maroc</li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4">Suivez-nous</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white text-2xl"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white text-2xl"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white text-2xl"><i class="fab fa-linkedin"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white text-2xl"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="mt-8 pt-8 border-t border-gray-700 text-center text-gray-400">
                <p>&copy; 2025 Menara. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mobile menu toggle
            const menuToggle = document.getElementById('menu-toggle');
            const mobileMenu = document.getElementById('mobile-menu');

            if (menuToggle && mobileMenu) {
                menuToggle.addEventListener('click', function() {
                    mobileMenu.classList.toggle('hidden');
                });
            }

            // Close mobile menu when clicking outside
            document.addEventListener('click', function(event) {
                // console.log("clicked");

                const isClickInside = menuToggle.contains(event.target) || mobileMenu.contains(event.target);
                if (!isClickInside) {
                    mobileMenu.classList.add('hidden');
                }
            });

            // Smooth scrolling for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth'
                        });
                    }
                });
            });
        });
    </script>
</body>

</html>