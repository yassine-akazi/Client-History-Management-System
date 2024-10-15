<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Ajouter Historique</title>
</head>

<body class="h-screen flex flex-col bg-gray-800">

    <!-- Barre de navigation -->
    <nav class="p-4 bg-gray-800 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-white text-xl font-bold"><a href="/">LOGO</a></h1>
            <ul class="flex space-x-4">
                <li><a href="/histories" class="text-gray-300 hover:text-blue-400 transition">Historiques</a></li>
            </ul>
        </div>
    </nav>

    <div class="flex-grow flex items-center justify-center">
        <div class="w-full max-w-xl p-6 bg-gray-700 rounded-lg shadow-lg">
            <h1 class="text-2xl font-bold mb-6 text-white text-center">Ajouter un historique</h1>
            <form class="max-w-md mx-auto" action="/create_history" method="POST">
                @csrf
                
                <div class="relative z-0 w-full mb-6 group">
                    <input  type="text" name="full_name" id="full-name" class="block py-2.5 px-0 w-full text-sm text-gray-100 bg-transparent border-b-2 border-gray-300 focus:outline-none focus:ring-0 focus:border-blue-400 peer" placeholder="" required />
                    <label for="full-name" class="peer-focus:font-medium absolute text-sm text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 left-0 peer-focus:left-0 peer-focus:text-blue-400 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0">Clients</label>
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <input  type="email" name="email" id="floating_email" class="block py-2.5 px-0 w-full text-sm text-gray-100 bg-transparent border-b-2 border-gray-300 focus:outline-none focus:ring-0 focus:border-blue-400 peer" placeholder=" " required />
                    <label for="floating_email" class="peer-focus:font-medium absolute text-sm text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 left-0 peer-focus:left-0 peer-focus:text-blue-400 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0">Adresse e-mail</label>
                </div>
                
                <div class="relative z-0 w-full mb-6 group">
                    <input  type="tel" pattern="^[0-9]{10}$" name="phone_number" id="nuber_phone" class="block py-2.5 px-0 w-full text-sm text-gray-100 bg-transparent border-b-2 border-gray-300 focus:outline-none focus:ring-0 focus:border-blue-400 peer" placeholder="" required />
                    <label for="nuber_phone" class="peer-focus:font-medium absolute text-sm text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 left-0 peer-focus:left-0 peer-focus:text-blue-400 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0">Numéro de téléphone (0600000000)</label>
                </div>
                <div class="grid md:grid-cols-2 md:gap-6 mb-6">
                    <div class="relative z-0 w-full group">
                        <input  type="datetime-local" name="starting" id="starting" class="block py-2.5 px-0 w-full text-sm text-gray-100 bg-transparent border-b-2 border-gray-300 focus:outline-none focus:ring-0 focus:border-blue-400 peer" placeholder=" " required />
                        <label for="starting" class="peer-focus:font-medium absolute text-sm text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 left-0 peer-focus:left-0 peer-focus:text-blue-400 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0">Début</label>
                    </div>
                    <div class="relative z-0 w-full group">
                        <input  type="datetime-local" name="ending" id="ending" class="block py-2.5 px-0 w-full text-sm text-gray-100 bg-transparent border-b-2 border-gray-300 focus:outline-none focus:ring-0 focus:border-blue-400 peer" placeholder=" "  />
                        <label for="ending" class="peer-focus:font-medium absolute text-sm text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 left-0 peer-focus:left-0 peer-focus:text-blue-400 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0">Fin</label>
                    </div>
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <input  type="text" name="subject" id="subject" class="block py-2.5 px-0 w-full text-sm text-gray-100 bg-transparent border-b-2 border-gray-300 focus:outline-none focus:ring-0 focus:border-blue-400 peer" placeholder=" " required />
                    <label for="subject" class="peer-focus:font-medium absolute text-sm text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 left-0 peer-focus:left-0 peer-focus:text-blue-400 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0">Sujet</label>
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <textarea name="description" id="description" class="block py-2.5 px-0 w-full text-sm text-gray-100 bg-transparent border-b-2 border-gray-300 focus:outline-none focus:ring-0 focus:border-blue-400 peer h-[200px]" placeholder=" " required></textarea>
                    <label for="description" class="peer-focus:font-medium absolute text-sm text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 left-0 peer-focus:left-0 peer-focus:text-blue-400 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0">Description</label>
                </div>
                
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-600 transition focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Ajouter</button>
            </form>
        </div>
    </div>
</body>
</html>