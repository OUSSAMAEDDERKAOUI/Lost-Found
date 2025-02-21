
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
          <button class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">
            Publier une annonce
          </button>
        </div>
      </nav>
    </header>

    <main class="container mx-auto px-4 py-8">
     



      <!-- Liste des annonces -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($annonces as $annonce)

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
            <p class="text-gray-600 mb-2">{{$annonce->description}}</p>
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

        
      
       
      </div>
    </main>
    <script>
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
  </script>
  

    
  </body>
</html>