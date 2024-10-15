<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Historique des Clients</title>
</head>
<body class="bg-gray-900 text-gray-300 p-6">
    
    <div class="container mx-auto p-6 space-y-6">
        <!-- Titre -->
        <h1 class="text-3xl font-extrabold mb-6 "><a href="/histories">Historique des Clients</a></h1>
        
        <!-- Formulaire de recherche -->
        <div class="shadow-lg bg-gray-800 p-6 rounded-lg">
            <form action="/search" method="GET" class="mb-6">
                <div class="flex items-center w-full lg:w-96 border border-gray-600 rounded-lg overflow-hidden shadow-sm">
                    <input type="text" name="search" placeholder="Rechercher un historique" 
                        class="w-full p-2 bg-gray-900 text-gray-300 border-none focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <button type="submit" class="bg-blue-600 text-white p-2 hover:bg-indigo-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 18a8 8 0 100-16 8 8 0 000 16zm5.292-3.292a1 1 0 011.416 0l3.586 3.586a1 1 0 01-1.416 1.416l-3.586-3.586a1 1 0 010-1.416z"/>
                        </svg>
                    </button>
                </div>
                
                <div class="flex space-x-4 mt-4">
                    <div>
                        <label for="start_date" class="block text-sm font-medium text-gray-400">Date de début</label>
                        <input type="date" name="start_date" id="start_date" 
                            class="mt-1 p-2 bg-gray-900 text-gray-300 border border-gray-600 rounded-md">
                    </div>
                    <div>
                        <label for="end_date" class="block text-sm font-medium text-gray-400">Date de fin</label>
                        <input type="date" name="end_date" id="end_date" 
                            class="mt-1 p-2 bg-gray-900 text-gray-300 border border-gray-600 rounded-md">
                    </div>
                </div>
            </form>
        </div>

        <!-- Bouton Ajouter -->
        <div class="flex justify-end">
            <a href="/">
                <button type="button" class="text-white bg-gradient-to-r from-blue-500 to-blue-600 hover:bg-gradient-to-l focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 transition duration-300 ease-in-out transform hover:scale-105">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                </button>
            </a>
        </div>

        <!-- Tableau d'historique -->
        <table class="min-w-full bg-gray-800 shadow-md rounded-lg overflow-hidden">
            <thead class="bg-gray-600 text-gray-100">
                <tr>
                    <th class="py-3 px-4 text-left">Clients</th>
                    <th class="py-3 px-4 text-left">Email</th>
                    <th class="py-3 px-4 text-left">Numéro de téléphone</th>
                    <th class="py-3 px-4 text-left">Début</th>
                    <th class="py-3 px-4 text-left">Fin</th>
                    <th class="py-3 px-4 text-left">Sujet</th>
                    <th class="py-3 px-4 text-left">Description</th>
                    <th class="py-3 px-4 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Histories as $Historie)
                <tr class=" {{ $Historie->ending ? 'hover:bg-green-100'  : 'hover:bg-red-100' }} border-b border-gray-600">
                    <td class="py-3 px-4 {{ $Historie->ending ? 'text-green-600' : 'text-red-600' }}">{{ $Historie->full_name }}</td>
                    <td class="py-3 px-4 {{ $Historie->ending ? 'text-green-600' : 'text-red-600' }}">{{ $Historie->email }}</td>
                    <td class="py-3 px-4 {{ $Historie->ending ? 'text-green-600' : 'text-red-600' }}">{{ $Historie->phone_number }}</td>
                    <td class="py-3 px-4 {{ $Historie->ending ? 'text-green-600' : 'text-red-600' }}">{{ $Historie->starting }}</td>
                    <td class="py-3 px-4 {{ $Historie->ending ? 'text-green-600' : 'text-red-600' }}">
                        {{ $Historie->ending ? $Historie->ending : 'Aucune date de fin' }}
                    </td>
                    <td class="py-3 px-4 {{ $Historie->ending ? 'text-green-600' : 'text-red-600' }}">{{ $Historie->subject }}</td>
                    <td class="py-3 px-4 {{ $Historie->ending ? 'text-green-600' : 'text-red-600' }}">{{ $Historie->description }}</td>
                    <td class="py-6 px-4 flex justify-between">
                        <a href="{{ route('histories.edit', $Historie->id) }}" class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 transition-transform duration-200 hover:scale-110" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 4H4a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2v-7M18.5 2.5l-5 5L13 9l5-5-1.5-1.5zM15 6l3 3"/>
                            </svg>
                        </a>
                
                        <form action="{{ route('histories.destroy', $Historie->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet historique ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-700 ml-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 transition-transform duration-200 hover:scale-110" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
</body>
</html>