<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menara - Portail Entreprise de Recrutement</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50">
    <!-- Header -->
    <header class="bg-white shadow">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <div class="flex items-center">
                <img src="/api/placeholder/120/60" alt="Logo" class="h-10">
                <h1 class="ml-3 text-2xl font-bold text-blue-700">Menara</h1>
            </div>
            <div>
                <a href="{{route('login')}}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Connexion</a>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="py-20 bg-gradient-to-r from-blue-600 to-indigo-700 text-white">
        <div class="container mx-auto px-4 flex flex-col md:flex-row items-center">
            <div class="md:w-1/2 mb-10 md:mb-0">
                <h2 class="text-4xl font-bold mb-6">Recrutez les meilleurs talents avec Menara</h2>
                <p class="text-xl mb-8">Publiez vos offres d'emploi, recevez des rapports détaillés sur les candidats et optimisez votre processus de recrutement.</p>
                <div class="flex flex-wrap">
                    <a href="{{route('companyregister')}}" class="bg-white text-blue-700 hover:bg-gray-100 font-bold py-3 px-6 rounded-lg mr-4 mb-4 md:mb-0">
                        Créer un compte entreprise
                    </a>
                    <a href="#how-it-works" class="bg-transparent border-2 border-white hover:bg-white hover:text-blue-700 text-white font-bold py-3 px-6 rounded-lg">
                        Comment ça marche
                    </a>
                </div>
            </div>
            <div class="md:w-1/2 flex justify-center">
            <img src="https://th.bing.com/th/id/R.ab6d5e968f97361bd87797f61278bc50?rik=Z4sgGszd3D92uw&riu=http%3a%2f%2fwww.entreprise20.fr%2fwp-content%2fuploads%2f2019%2f10%2frecrutement-des-employ%c3%a9s.jpg&ehk=r9KojIq3YdmVxDiZs83IxEWRbPBCzEOdTLvHSqtXDMs%3d&risl=&pid=ImgRaw&r=0" alt="Recrutement" class="rounded-lg shadow-xl">
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section id="how-it-works" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12 text-gray-800">Comment ça marche</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="p-6 border rounded-lg hover:shadow-lg transition-shadow text-center">
                    <div class="text-blue-600 text-4xl mb-4 flex justify-center">
                        <div class="h-16 w-16 bg-blue-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-user-plus"></i>
                        </div>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">1. Inscrivez votre entreprise</h3>
                    <p class="text-gray-600">Créez un compte entreprise et configurez votre profil.</p>
                </div>
                
                <div class="p-6 border rounded-lg hover:shadow-lg transition-shadow text-center">
                    <div class="text-blue-600 text-4xl mb-4 flex justify-center">
                        <div class="h-16 w-16 bg-blue-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-briefcase"></i>
                        </div>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">2. Publiez vos offres</h3>
                    <p class="text-gray-600">Créez et publiez des offres d'emploi détaillées avec les compétences requises.</p>
                </div>
                
                <div class="p-6 border rounded-lg hover:shadow-lg transition-shadow text-center">
                    <div class="text-blue-600 text-4xl mb-4 flex justify-center">
                        <div class="h-16 w-16 bg-blue-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-comments"></i>
                        </div>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">3. Suivi des entretiens</h3>
                    <p class="text-gray-600">Notre équipe assigne les entretiens aux recruteurs spécialisés.</p>
                </div>
                
                <div class="p-6 border rounded-lg hover:shadow-lg transition-shadow text-center">
                    <div class="text-blue-600 text-4xl mb-4 flex justify-center">
                        <div class="h-16 w-16 bg-blue-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-chart-bar"></i>
                        </div>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">4. Recevez des rapports</h3>
                    <p class="text-gray-600">Accédez à des rapports détaillés sur les candidats évalués.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-16 bg-gray-100">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12 text-gray-800">Avantages pour les entreprises</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="text-blue-600 text-4xl mb-4">
                        <i class="fas fa-bullseye"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Recrutement ciblé</h3>
                    <p class="text-gray-600">Nos recruteurs spécialisés évaluent les compétences techniques et transversales spécifiques à votre secteur.</p>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="text-blue-600 text-4xl mb-4">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Gain de temps</h3>
                    <p class="text-gray-600">Réduisez le temps consacré aux entretiens préliminaires et concentrez-vous sur les candidats les plus prometteurs.</p>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="text-blue-600 text-4xl mb-4">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Rapports détaillés</h3>
                    <p class="text-gray-600">Accédez à des évaluations complètes pour chaque candidat avec des scores précis sur les compétences clés.</p>
                </div>
            </div>
        </div>
    </section>

    

    <!-- Company Showcase Section -->
    <section class="py-16 bg-gray-100">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12 text-gray-800">Ils nous font confiance</h2>
            
            <div class="grid grid-cols-2 md:grid-cols-5 gap-8 items-center">
                <div class="p-4 flex justify-center">
                    <img src="https://vectorseek.com/wp-content/uploads/2022/02/vectorseek.com-Capgemini-Logo-Vector.png" alt="Logo entreprise" class="h-12 opacity-70 hover:opacity-100 transition-opacity">
                </div>
                <div class="p-4 flex justify-center">
                    <img src="https://cdn.phenompeople.com/CareerConnectResources/prod/LEFAGLOBAL/images/DXCLogoHoriz_PurpleBlackRGB-1662486454896.png" alt="Logo entreprise" class="h-12 opacity-70 hover:opacity-100 transition-opacity">
                </div>
                <div class="p-4 flex justify-center">
                    <img src="https://www.wetech.ma/im/180/images/300/ca-6apddb3ibfe48c919y9gq3n9kv6plk30012020121302.jpg" alt="Logo entreprise" class="h-12 opacity-70 hover:opacity-100 transition-opacity">
                </div>
                <div class="p-4 flex justify-center">
                    <img src="/api/placeholder/120/60" alt="Logo entreprise" class="h-12 opacity-70 hover:opacity-100 transition-opacity">
                </div>
                <div class="p-4 flex justify-center">
                    <img src="/api/placeholder/120/60" alt="Logo entreprise" class="h-12 opacity-70 hover:opacity-100 transition-opacity">
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12 text-gray-800">Témoignages d'entreprises</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="p-6 border rounded-lg hover:shadow-lg transition-shadow">
                    <div class="flex items-center mb-4">
                        <img src="img" alt="Avatar" class="h-12 w-12 rounded-full mr-4">
                        <div>
                            <p class="font-bold">Ahmed Benjelloun</p>
                            <p class="text-gray-600">DRH, MarocTech</p>
                        </div>
                    </div>
                    <p class="text-gray-700 italic">"Grâce à Menara, nous avons réduit notre temps de recrutement de 40%. Les rapports détaillés nous aident à prendre des décisions plus éclairées."</p>
                </div>
                
                <div class="p-6 border rounded-lg hover:shadow-lg transition-shadow">
                    <div class="flex items-center mb-4">
                        <img src="img" alt="Avatar" class="h-12 w-12 rounded-full mr-4">
                        <div>
                            <p class="font-bold">Laila Alaoui</p>
                            <p class="text-gray-600">Responsable Recrutement, FinancePlus</p>
                        </div>
                    </div>
                    <p class="text-gray-700 italic">"La qualité des évaluations techniques nous a permis d'identifier rapidement les candidats qui correspondent vraiment à nos besoins."</p>
                </div>
                
                <div class="p-6 border rounded-lg hover:shadow-lg transition-shadow">
                    <div class="flex items-center mb-4">
                        <img src="img" alt="Avatar" class="h-12 w-12 rounded-full mr-4">
                        <div>
                            <p class="font-bold">Karim Tazi</p>
                            <p class="text-gray-600">CEO, Startup Innovation</p>
                        </div>
                    </div>
                    <p class="text-gray-700 italic">"En tant que startup, nous n'avions pas les ressources pour gérer efficacement notre recrutement. Menara nous a fourni l'expertise dont nous avions besoin."</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-16 bg-gradient-to-r from-blue-600 to-indigo-700 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-4">Prêt à transformer votre processus de recrutement?</h2>
            <p class="text-xl mb-8 max-w-2xl mx-auto">Créez votre compte entreprise dès aujourd'hui et commencez à publier vos offres d'emploi.</p>
            <a href="{{route('companyregister')}}" class="bg-white text-blue-700 hover:bg-gray-100 font-bold py-3 px-8 rounded-lg inline-block">Créer un compte maintenant</a>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12 text-gray-800">Questions fréquentes</h2>
            
            <div class="max-w-3xl mx-auto">
                <div class="mb-6">
                    <h3 class="text-xl font-semibold mb-2">Comment fonctionne le processus de recrutement avec Menara?</h3>
                    <p class="text-gray-600">Après avoir créé votre compte et publié une offre d'emploi, notre équipe d'administrateurs l'examine et assigne les entretiens à nos recruteurs spécialisés. Vous recevez ensuite des rapports détaillés sur chaque candidat évalué.</p>
                </div>
                
                <div class="mb-6">
                    <h3 class="text-xl font-semibold mb-2">Combien coûte l'utilisation de la plateforme?</h3>
                    <p class="text-gray-600">Nous proposons différentes formules d'abonnement adaptées à la taille de votre entreprise et à vos besoins en recrutement. Contactez-nous pour obtenir un devis personnalisé.</p>
                </div>
                
                <div class="mb-6">
                    <h3 class="text-xl font-semibold mb-2">Quels types de postes peuvent être évalués?</h3>
                    <p class="text-gray-600">Notre plateforme est particulièrement adaptée aux postes techniques (développeurs, ingénieurs, data scientists, etc.) mais aussi aux postes administratifs et managériaux. Nos questionnaires d'évaluation sont personnalisables selon vos besoins.</p>
                </div>
                
                <div>
                    <h3 class="text-xl font-semibold mb-2">Comment puis-je suivre l'avancement du processus de recrutement?</h3>
                    <p class="text-gray-600">Votre tableau de bord entreprise vous permet de suivre en temps réel le statut de vos offres d'emploi et des candidats en cours d'évaluation. Vous recevez également des notifications par email à chaque étape importante.</p>
                </div>
            </div>
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
                        <li><a href="#" class="text-gray-400 hover:text-white">Tarifs</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">À propos</a></li>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // Smooth scrolling for anchor links
            $('a[href^="#"]').on('click', function(event) {
                event.preventDefault();
                $('html, body').animate({
                    scrollTop: $($.attr(this, 'href')).offset().top
                }, 800);
            });
        });
    </script>
</body>
</html>