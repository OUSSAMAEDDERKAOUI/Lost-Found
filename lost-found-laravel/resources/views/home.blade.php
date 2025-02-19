{{-- <!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lost & Found - Retrouvez vos objets perdus</title>
    <link rel="stylesheet" href="/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script type="module" src="/counter.js"></script>
  </head>
  <body class="bg-gray-100">
    <header class="bg-white shadow-md">
      <nav class="container mx-auto px-4 py-6">
        <div class="flex justify-between items-center">
          <h1 class="text-2xl font-bold text-indigo-600">Lost & Found</h1>
          <button id="newPostBtn" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">
            Publier une annonce
          </button>
        </div>
      </nav>
    </header>

    <main class="container mx-auto px-4 py-8">
      <!-- Filtres et recherche -->
      <div class="mb-8 bg-white p-4 rounded-lg shadow">
        <div class="flex flex-wrap gap-4">
          <input
            type="text"
            id="searchInput"
            placeholder="Rechercher un objet..."
            class="flex-1 p-2 border rounded-lg"
          />
          <select id="categoryFilter" class="p-2 border rounded-lg">
            <option value="">Toutes les catégories</option>
            <option value="vetements">Vêtements</option>
            <option value="electronique">Électronique</option>
            <option value="documents">Documents</option>
            <option value="cles">Clés</option>
            <option value="autres">Autres</option>
          </select>
          <select id="typeFilter" class="p-2 border rounded-lg">
            <option value="">Perdu/Trouvé</option>
            <option value="lost">Perdu</option>
            <option value="found">Trouvé</option>
          </select>
        </div>
      </div>

      <!-- Statistiques -->
      <div class="mb-8 grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="bg-white p-4 rounded-lg shadow text-center">
          <h3 class="text-lg font-semibold text-gray-700">Total des annonces</h3>
          <p id="totalPosts" class="text-2xl font-bold text-indigo-600">0</p>
        </div>
        <div class="bg-white p-4 rounded-lg shadow text-center">
          <h3 class="text-lg font-semibold text-gray-700">Objets perdus</h3>
          <p id="totalLost" class="text-2xl font-bold text-red-600">0</p>
        </div>
        <div class="bg-white p-4 rounded-lg shadow text-center">
          <h3 class="text-lg font-semibold text-gray-700">Objets trouvés</h3>
          <p id="totalFound" class="text-2xl font-bold text-green-600">0</p>
        </div>
      </div>

      <!-- Liste des annonces -->
      <div id="postsList" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Les annonces seront ajoutées ici dynamiquement -->
      </div>
    </main>

    <!-- Modal de création d'annonce -->
    <div id="postModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
      <div class="bg-white rounded-lg p-6 w-full max-w-lg">
        <h2 class="text-xl font-bold mb-4">Nouvelle annonce</h2>
        <form id="postForm" class="space-y-4">
          <div>
            <label class="block text-sm font-medium text-gray-700">Type d'annonce</label>
            <select name="type" class="mt-1 block w-full p-2 border rounded-lg" required>
              <option value="lost">Objet perdu</option>
              <option value="found">Objet trouvé</option>
            </select>
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700">Titre</label>
            <input type="text" name="title" class="mt-1 block w-full p-2 border rounded-lg" required>
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700">Catégorie</label>
            <select name="category" class="mt-1 block w-full p-2 border rounded-lg" required>
              <option value="vetements">Vêtements</option>
              <option value="electronique">Électronique</option>
              <option value="documents">Documents</option>
              <option value="cles">Clés</option>
              <option value="autres">Autres</option>
            </select>
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" class="mt-1 block w-full p-2 border rounded-lg" rows="3" required></textarea>
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700">Lieu</label>
            <input type="text" name="location" class="mt-1 block w-full p-2 border rounded-lg" required>
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700">Date</label>
            <input type="date" name="date" class="mt-1 block w-full p-2 border rounded-lg" required>
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" class="mt-1 block w-full p-2 border rounded-lg" required>
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700">Téléphone</label>
            <input type="tel" name="phone" class="mt-1 block w-full p-2 border rounded-lg" required>
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700">Photo (URL)</label>
            <input type="url" name="image" class="mt-1 block w-full p-2 border rounded-lg">
          </div>
          <div class="flex justify-end gap-4">
            <button type="button" id="cancelPost" class="px-4 py-2 border rounded-lg">Annuler</button>
            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">Publier</button>
          </div>
        </form>
      </div>
    </div>

    <!-- Scripts JavaScript -->
    <script >




export function setupCounter(element) {
  let counter = 0
  const setCounter = (count) => {
    counter = count
    element.innerHTML = `count is ${counter}`
  }
  element.addEventListener('click', () => setCounter(counter + 1))
  setCounter(0)
}

        // Store pour les données
const store = {
  posts: [],
  filters: {
    search: '',
    category: '',
    type: ''
  }
};

// Gestionnaire d'événements pour le formulaire
function setupEventListeners() {
  // Bouton nouvelle annonce
  document.getElementById('newPostBtn').addEventListener('click', () => {
    document.getElementById('postModal').classList.remove('hidden');
  });

  // Bouton annuler
  document.getElementById('cancelPost').addEventListener('click', () => {
    document.getElementById('postModal').classList.add('hidden');
    document.getElementById('postForm').reset();
  });

  // Soumission du formulaire
  document.getElementById('postForm').addEventListener('submit', (e) => {
    e.preventDefault();
    const formData = new FormData(e.target);
    const post = {
      id: Date.now(),
      type: formData.get('type'),
      title: formData.get('title'),
      category: formData.get('category'),
      description: formData.get('description'),
      location: formData.get('location'),
      date: formData.get('date'),
      email: formData.get('email'),
      phone: formData.get('phone'),
      image: formData.get('image'),
      comments: [],
      createdAt: new Date().toISOString()
    };

    store.posts.unshift(post);
    saveToLocalStorage();
    renderPosts();
    updateStats();
    
    document.getElementById('postModal').classList.add('hidden');
    e.target.reset();
  });

  // Filtres
  document.getElementById('searchInput').addEventListener('input', (e) => {
    store.filters.search = e.target.value.toLowerCase();
    renderPosts();
  });

  document.getElementById('categoryFilter').addEventListener('change', (e) => {
    store.filters.category = e.target.value;
    renderPosts();
  });

  document.getElementById('typeFilter').addEventListener('change', (e) => {
    store.filters.type = e.target.value;
    renderPosts();
  });
}

// Rendu des annonces
function renderPosts() {
  const postsContainer = document.getElementById('postsList');
  const filteredPosts = filterPosts();
  
  postsContainer.innerHTML = filteredPosts.map(post => `
    <article class="bg-white rounded-lg shadow overflow-hidden">
      ${post.image ? `
        <img src="${post.image}" alt="${post.title}" class="w-full h-48 object-cover">
      ` : ''}
      <div class="p-4">
        <div class="flex justify-between items-start mb-2">
          <h3 class="text-lg font-semibold">${post.title}</h3>
          <span class="px-2 py-1 text-sm rounded ${
            post.type === 'lost' ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800'
          }">
            ${post.type === 'lost' ? 'Perdu' : 'Trouvé'}
          </span>
        </div>
        <p class="text-gray-600 mb-2">${post.description}</p>
        <div class="text-sm text-gray-500 space-y-1">
          <p>📍 ${post.location}</p>
          <p>📅 ${new Date(post.date).toLocaleDateString()}</p>
          <p>📱 ${post.phone}</p>
          <p>✉️ ${post.email}</p>
        </div>
        <div class="mt-4 pt-4 border-t">
          <button 
            class="text-indigo-600 hover:text-indigo-800"
            onclick="showComments(${post.id})"
          >
            ${post.comments.length} commentaire(s)
          </button>
        </div>
      </div>
    </article>
  `).join('');
}

// Filtrage des annonces
function filterPosts() {
  return store.posts.filter(post => {
    const matchesSearch = post.title.toLowerCase().includes(store.filters.search) ||
                         post.description.toLowerCase().includes(store.filters.search) ||
                         post.location.toLowerCase().includes(store.filters.search);
    const matchesCategory = !store.filters.category || post.category === store.filters.category;
    const matchesType = !store.filters.type || post.type === store.filters.type;
    
    return matchesSearch && matchesCategory && matchesType;
  });
}

// Mise à jour des statistiques
function updateStats() {
  document.getElementById('totalPosts').textContent = store.posts.length;
  document.getElementById('totalLost').textContent = store.posts.filter(p => p.type === 'lost').length;
  document.getElementById('totalFound').textContent = store.posts.filter(p => p.type === 'found').length;
}

// Gestion du stockage local
function saveToLocalStorage() {
  localStorage.setItem('lostAndFoundPosts', JSON.stringify(store.posts));
}

function loadFromLocalStorage() {
  const saved = localStorage.getItem('lostAndFoundPosts');
  if (saved) {
    store.posts = JSON.parse(saved);
    renderPosts();
    updateStats();
  }
}

// Initialisation
function init() {
  setupEventListeners();
  loadFromLocalStorage();
}

init();

// Fonction globale pour afficher les commentaires (appelée depuis le HTML)
window.showComments = function(postId) {
  const post = store.posts.find(p => p.id === postId);
  if (!post) return;

  const comment = prompt('Ajouter un commentaire:');
  if (comment) {
    post.comments.push({
      id: Date.now(),
      text: comment,
      createdAt: new Date().toISOString()
    });
    saveToLocalStorage();
    renderPosts();
  }
};
    </script>
    
  </body>
</html> --}}
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
      <!-- Filtres et recherche -->
      <div class="mb-8 bg-white p-4 rounded-lg shadow">
        <div class="flex flex-wrap gap-4">
          <input
            type="text"
            placeholder="Rechercher un objet..."
            class="flex-1 p-2 border rounded-lg"
          />
          <select class="p-2 border rounded-lg">
            <option value="">Toutes les catégories</option>
            <option value="vetements">Vêtements</option>
            <option value="electronique">Électronique</option>
            <option value="documents">Documents</option>
            <option value="cles">Clés</option>
            <option value="autres">Autres</option>
          </select>
          <select class="p-2 border rounded-lg">
            <option value="">Perdu/Trouvé</option>
            <option value="lost">Perdu</option>
            <option value="found">Trouvé</option>
          </select>
        </div>
      </div>

      <!-- Statistiques -->
      <div class="mb-8 grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="bg-white p-4 rounded-lg shadow text-center">
          <h3 class="text-lg font-semibold text-gray-700">Total des annonces</h3>
          <p class="text-2xl font-bold text-indigo-600">15</p>
        </div>
        <div class="bg-white p-4 rounded-lg shadow text-center">
          <h3 class="text-lg font-semibold text-gray-700">Objets perdus</h3>
          <p class="text-2xl font-bold text-red-600">8</p>
        </div>
        <div class="bg-white p-4 rounded-lg shadow text-center">
          <h3 class="text-lg font-semibold text-gray-700">Objets trouvés</h3>
          <p class="text-2xl font-bold text-green-600">7</p>
        </div>
      </div>

      <!-- Liste des annonces -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Annonce 1 -->
        <article class="bg-white rounded-lg shadow overflow-hidden">
          <img src="https://images.unsplash.com/photo-1598532163257-ae3c6b2524b6?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" 
               alt="iPhone perdu" 
               class="w-full h-48 object-cover">
          <div class="p-4">
            <div class="flex justify-between items-start mb-2">
              <h3 class="text-lg font-semibold">iPhone 13 Pro perdu</h3>
              <span class="px-2 py-1 text-sm rounded bg-red-100 text-red-800">Perdu</span>
            </div>
            <p class="text-gray-600 mb-2">iPhone 13 Pro gris sidéral perdu dans le parc central</p>
            <div class="text-sm text-gray-500 space-y-1">
              <p>📍 Parc Central</p>
              <p>📅 15/03/2024</p>
              <p>📱 06 12 34 56 78</p>
              <p>✉️ contact@email.com</p>
            </div>
            <div class="mt-4 pt-4 border-t">
              <a href="/details.html" class="text-indigo-600 hover:text-indigo-800">
                Voir les détails (3 commentaires)
              </a>
            </div>
          </div>
        </article>

        <!-- Annonce 2 -->
        <article class="bg-white rounded-lg shadow overflow-hidden">
            <img src="https://images.unsplash.com/photo-1598532163257-ae3c6b2524b6?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" 
            alt="Portefeuille trouvé" 
               class="w-full h-48 object-cover">
          <div class="p-4">
            <div class="flex justify-between items-start mb-2">
              <h3 class="text-lg font-semibold">Portefeuille en cuir marron</h3>
              <span class="px-2 py-1 text-sm rounded bg-green-100 text-green-800">Trouvé</span>
            </div>
            <p class="text-gray-600 mb-2">Portefeuille trouvé près de la station de métro</p>
            <div class="text-sm text-gray-500 space-y-1">
              <p>📍 Station Métro Centre</p>
              <p>📅 14/03/2024</p>
              <p>📱 07 98 76 54 32</p>
              <p>✉️ finder@email.com</p>
            </div>
            <div class="mt-4 pt-4 border-t">
              <a href="/details.html" class="text-indigo-600 hover:text-indigo-800">
                Voir les détails (1 commentaire)
              </a>
            </div>
          </div>
        </article>

        <!-- Annonce 3 -->
        <article class="bg-white rounded-lg shadow overflow-hidden">
            <img src="https://images.unsplash.com/photo-1598532163257-ae3c6b2524b6?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" 
            alt="Portefeuille trouvé" 
               class="w-full h-48 object-cover">
          <div class="p-4">
            <div class="flex justify-between items-start mb-2">
                
              <h3 class="text-lg font-semibold">Clés de voiture</h3>
              <span class="px-2 py-1 text-sm rounded bg-red-100 text-red-800">Perdu</span>
            </div>
            <p class="text-gray-600 mb-2">Trousseau de clés avec porte-clés Eiffel perdu</p>
            <div class="text-sm text-gray-500 space-y-1">
              <p>📍 Rue du Commerce</p>
              <p>📅 13/03/2024</p>
              <p>📱 06 11 22 33 44</p>
              <p>✉️ keys@email.com</p>
            </div>
            <div class="mt-4 pt-4 border-t">
              <a href="/details.html" class="text-indigo-600 hover:text-indigo-800">
                Voir les détails (0 commentaire)
              </a>
            </div>
          </div>
        </article>
      </div>
    </main>
  </body>
</html>