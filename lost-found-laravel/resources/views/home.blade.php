
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lost & Found - Retrouvez vos objets perdus</title>
    <link rel="stylesheet" href="/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

  </head>
  <body class="bg-gray-100">
    <header class="bg-white shadow-md">
      <nav class="container mx-auto px-4 py-6">
        <div class="flex justify-between items-center">
          <h1 class="text-2xl font-bold text-indigo-600">Lost & Found</h1>
        
          <button type='button' id="annonceButton" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700"> Publier une annonce</button>

        </div>
      </nav>
    </header>

    <main class="container mx-auto px-4 py-8">
      <!-- Filtres et recherche -->
      <div class="mb-8 bg-white p-4 rounded-lg shadow">
        <form action = "{{route('search')}}" method= "POST" >

        <div class="flex flex-wrap gap-4">
            @csrf
          <input name='title' type="text" placeholder="Rechercher un objet..." class="flex-1 p-2 border rounded-lg" />
        
          <select name='type' class="p-2 border rounded-lg">
            <option value="">Perdu/Trouvé</option>
            <option value="Lost">Perdu</option>
            <option value="Found">Trouvé</option>
          </select>
          <button class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">
            Rechercher
          </button>
        </div>

        </form>
          
          
      </div>

      <!-- Statistiques -->
      <div class="mb-8 grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="bg-white p-4 rounded-lg shadow text-center">
          <h3 class="text-lg font-semibold text-gray-700">Total des annonces</h3>
          <p class="text-2xl font-bold text-indigo-600">{{$countAll}}</p> 
        </div>
        <div class="bg-white p-4 rounded-lg shadow text-center">
          <h3 class="text-lg font-semibold text-gray-700">Objets perdus</h3>
          <p class="text-2xl font-bold text-red-600">{{$countLost}}</p>
        </div>
        <div class="bg-white p-4 rounded-lg shadow text-center">
          <h3 class="text-lg font-semibold text-gray-700">Objets trouvés</h3>
          <p class="text-2xl font-bold text-green-600">{{$countFound}}</p>
        </div>
      </div>
  <!-- Modal de création d'annonce -->
 <!-- Bouton pour ouvrir le modal -->

<!-- Modal de création d'annonce -->
<div id="annonceModal" class=" hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
  <div class="bg-white rounded-lg p-6 w-1/2 h-4/5 flex flex-col ">
    <h2 class="text-xl font-bold mb-4 flex-none">Nouvelle annonce</h2>
    <form id="postForm" method="POST" action="{{route('store')}}" class="space-y-4 flex-1 overflow-y-auto" enctype="multipart/form-data" >
@csrf     
 <div>
        <label class="block text-sm font-medium text-gray-700">Type d'annonce</label>
        <select name="type" class="mt-1 block w-full p-2 border rounded-lg" required>
          <option value="Lost">Objet perdu</option>
          <option value="Found">Objet trouvé</option>
        </select>
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700">Titre</label>
        <input type="text" name="title" class="mt-1 block w-full p-2 border rounded-lg" required />
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700">Catégorie</label>
         
        <select name="category" id="category" class="mt-1 block w-full p-2 border rounded-lg" required>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : '' }}>
                    {{ $category->titre }}  
                </option>
            @endforeach
        </select>
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700">Description</label>
        <textarea name="description" class="mt-1 block w-full p-2 border rounded-lg" rows="3" required></textarea>
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700">Lieu</label>
        <input type="text" name="location" class="mt-1 block w-full p-2 border rounded-lg" required />
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700">Date</label>
        <input type="date" name="date" class="mt-1 block w-full p-2 border rounded-lg" required />
      </div>
     
      <div>
        <label class="block text-sm font-medium text-gray-700">Téléphone</label>
        <input type="tel" name="phone" class="mt-1 block w-full p-2 border rounded-lg" required />
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700" for="image">Choisir une image:</label>
        <input type="file" name="image" class="mt-1 block w-full p-2 border rounded-lg" />
      </div>
      <div class="flex justify-end gap-4 pt-4">
        <button type="button" id="cancelannonce" class="px-4 py-2 border rounded-lg hover:bg-gray-50">
          Annuler
        </button>
        <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
          Publier
        </button>
      </div>
    </form>
  </div>
</div>

      <!-- Liste des annonces -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Annonce 1 -->
        @foreach($users as $user)
        @foreach ($user->annonces as $annonce)

        <article class="bg-white rounded-lg shadow overflow-hidden">
          @if($annonce->image)
          <img src="{{ asset('storage/' . $annonce->image) }}" 
               alt="{{ $annonce->title }}" 
               class="w-full h-48 object-cover">
      @else
      <img src="https://images.unsplash.com/photo-1598532163257-ae3c6b2524b6?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" 
      alt="Image par défaut" 
               class="w-full h-48 object-cover">
      @endif
          <div class="p-4">
            <div class="flex justify-between items-start mb-2">
              <h3 class="text-lg font-semibold">{{$annonce->title}}</h3>
              @if($annonce->type=='Lost') 
              <span class="px-2 py-1 text-sm rounded bg-red-100 text-red-800">Perdu</span>
              @else
              <span class="px-2 py-1 text-sm rounded bg-green-100 text-green-800">Trouvé</span>

              @endif
            </div>
            <p class="text-gray-600 mb-2">{{$user->description}}</p>
            <div class="text-sm text-gray-500 space-y-1">
              <p>📍{{$annonce->lieu}}</p>
              <p>📅 {{$annonce->created_at}}</p>
              <p>📱 {{$annonce->phone}}</p>
            </div>
            <div class="mt-4 pt-4 border-t">

              <a href="{{route('details', $annonce->id)}}" class="text-indigo-600 hover:text-indigo-800">
              ->Voir les détails 
              </a>
            </div>
          </div>
        </article>
        @endforeach
        @endforeach

        
      
       
      </div>
    </main>
    <script>
      // Ouvrir le modal lorsque le bouton est cliqué
      document.getElementById('annonceButton').addEventListener('click', function() {
          document.getElementById('annonceModal').classList.remove('hidden');  
      });
  
      // Fermer le modal lorsque le bouton "Annuler" est cliqué
      document.getElementById('cancelannonce').addEventListener('click', function() {
          document.getElementById('annonceModal').classList.add('hidden'); 
      });
  
      // Fermer le modal en cliquant à l'extérieur du modal
      window.addEventListener('click', function(event) {
          if (event.target === document.getElementById('annonceModal')) {
              document.getElementById('annonceModal').classList.add('hidden');  
          }
      });
  </script>
  

    {{-- <script>
      document.getElementById('annonceButton').addEventListener('click', function() {
          document.getElementById('annonceModal').classList.remove('hidden');  
      });
  
      document.getElementById('cancelannonce').addEventListener('click', function() {
          document.getElementById('annonceModal').classList.add('hidden'); 
      });
  
      window.addEventListener('click', function(event) {
          if (event.target === document.getElementById('annonceModal')) {
              document.getElementById('annonceModal').classList.add('hidden');  
          }
      });
  </script> --}}
  </body>
</html>