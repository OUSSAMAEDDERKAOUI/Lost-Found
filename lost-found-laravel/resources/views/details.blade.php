<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Détails de l'annonce - Lost & Found</title>
    <link rel="stylesheet" href="/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

  </head>
  <body class="bg-gray-100">
    <header class="bg-white shadow-md">
      <nav class="container mx-auto px-4 py-6">
        <div class="flex justify-between items-center">
          <h1 class="text-2xl font-bold text-indigo-600">
            <a href="/" class="hover:text-indigo-800">Lost & Found</a>
          </h1>
        </div>
      </nav>
    </header>

    <main class="container mx-auto px-4 py-8">
      <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
          <img src="https://images.unsplash.com/photo-1598532163257-ae3c6b2524b6?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" 
               alt="iPhone perdu" 
               class="w-full h-64 object-cover">
          <div class="p-6">
            <div class="flex justify-between items-start mb-4">
              <h2 class="text-2xl font-bold">iPhone 13 Pro perdu</h2>
              <span class="px-3 py-1 text-sm rounded bg-red-100 text-red-800">
                Perdu
              </span>
            </div>
            
            <div class="space-y-4">
              <p class="text-gray-700">iPhone 13 Pro gris sidéral perdu dans le parc central. L'appareil est dans une coque bleue avec des stickers. Récompense proposée pour celui qui le retrouvera.</p>
              
              <div class="grid grid-cols-2 gap-4 text-sm text-gray-600">
                <div>
                  <p class="font-semibold">Catégorie:</p>
                  <p>Électronique</p>
                </div>
                <div>
                  <p class="font-semibold">Date:</p>
                  <p>15/03/2024</p>
                </div>
                <div>
                  <p class="font-semibold">Lieu:</p>
                  <p>Parc Central</p>
                </div>
                <div>
                  <p class="font-semibold">Contact:</p>
                  <p>📱 06 12 34 56 78</p>
                  <p>✉️ contact@email.com</p>
                </div>
              </div>
            </div>

            <div class="mt-8">
              <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-semibold">Commentaires (3)</h3>
                <button class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">
                  Ajouter un commentaire
                </button>
              </div>
              
              <div class="space-y-4">
                <div class="bg-gray-50 p-4 rounded-lg">
                  <p class="text-gray-700">J'ai vu un iPhone qui correspond à la description près du kiosque à journaux.</p>
                  <p class="text-sm text-gray-500 mt-2">15/03/2024 14:30</p>
                </div>
                
                <div class="bg-gray-50 p-4 rounded-lg">
                  <p class="text-gray-700">Je vais vérifier au kiosque sur mon chemin du retour ce soir.</p>
                  <p class="text-sm text-gray-500 mt-2">15/03/2024 15:45</p>
                </div>
                
                <div class="bg-gray-50 p-4 rounded-lg">
                  <p class="text-gray-700">Je suis passé mais je n'ai rien trouvé malheureusement.</p>
                  <p class="text-sm text-gray-500 mt-2">15/03/2024 18:20</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <div id="commentModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="bg-white rounded-lg p-6 w-full max-w-lg">
          <h2 class="text-xl font-bold mb-4">Ajouter un commentaire</h2>
          <form id="commentForm" class="space-y-4">
            <div>
              <label class="block text-sm font-medium text-gray-700">Votre commentaire</label>
              <textarea name="comment" class="mt-1 block w-full p-2 border rounded-lg" rows="3" required></textarea>
            </div>
            <div class="flex justify-end gap-4">
              <button type="button" id="cancelComment" class="px-4 py-2 border rounded-lg">Annuler</button>
              <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">Publier</button>
            </div>
          </form>
        </div>
      </div>
  </body>
</html>