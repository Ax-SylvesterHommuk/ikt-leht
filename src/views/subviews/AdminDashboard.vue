<template>
  <div class="font-montserrat min-h-screen flex items-center justify-center bg-gray-100">
    <div class="bg-white p-8 shadow-md rounded-md max-w-sm w-full">
      <h2 class="text-2xl font-semibold mb-4">Admin Dashboard</h2>
      <p class="text-green-800 animate-pulse">You are now logged in as admin.</p>
      <button @click="logout" class="w-full bg-black text-white font-semibold py-2 px-4 mt-4 hover:bg-gray-800">Logout</button>
      
    <!-- Modal for adding new item -->
    <div v-if="showModal" class="fixed z-10 inset-0 overflow-y-auto">
      <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
        <form @submit.prevent="addItem" class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
          <div class="sm:flex sm:items-start">
            <div class="w-full">
            <h3 class="text-lg leading-6 font-medium text-gray-900">Lisa uus üritus</h3>
            <div class="mt-2">
              <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Ürituse nimi</label>
                <input type="text" name="title" id="title" v-model="newItem.title" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>
              <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Kirjeldus</label>
                <textarea name="description" id="description" v-model="newItem.description" required rows="3" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
              </div>
              <div class="mb-4">
                <label for="organizer" class="block text-sm font-medium text-gray-700">Korraldaja</label>
                <input type="text" name="organizer" id="organizer" v-model="newItem.organizer" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>
              <div class="mb-4">
                <label for="date" class="block text-sm font-medium text-gray-700">Kuupäev</label>
                <input type="date" name="date" id="date" v-model="newItem.date" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>
              <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700">Pilt</label>
                <input type="file" name="image" id="image" @change="handleFileUpload" accept="image/*" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>
            </div>
            </div>
          </div>
          <div class="mt-5 sm:mt-6">
            <button type="submit" class="inline-flex justify-center w-full rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:text-sm">
            Lisa üritus
            </button>
          </div>
        </form>
        <button @click="showModal = false" class="absolute top-0 right-0 m-4 text-gray-500 hover:text-gray-700">
          <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
          </svg>
        </button>
        </div>
      </div>
    </div>
      <!-- End of Modal -->

        <!-- Modal for deleting items -->
        <div v-if="showDeleteModal" class="fixed z-10 inset-0 overflow-y-auto">
            <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-900 opacity-75"></div>
            </div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <h3 class="text-lg leading-6 font-medium text-gray-900">Kustuta üritusi</h3>
            <ul>
                <li v-for="event in events" :key="event.Urituse_ID">
                {{ event.Pealkiri }}
                <button @click="deleteItem(event.Urituse_ID)" class="bg-red-600 text-white font-semibold py-2 px-4 mt-4 hover:bg-red-800">Kustuta</button>
                </li>
            </ul>
            </div>
            <button @click="showDeleteModal = false" class="absolute top-0 right-0 m-4 text-gray-500 hover:text-gray-700">
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
            </div>
            </div>
        </div>
        <!-- End of Modal -->
      
      <button @click="showModal = true" class="w-full bg-indigo-600 text-white font-semibold py-2 px-4 mt-4 hover:bg-indigo-800">Lisa uus üritus</button>
      <button @click="showDeleteModal = true" class="w-full bg-red-600 text-white font-semibold py-2 px-4 mt-4 hover:bg-red-800">Kustuta üritusi</button>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      showModal: false,
      showDeleteModal: false,
      events: [],
      newItem: {
        title: '',
        description: '',
        organizer: '',
        date: '',
        image: null
      }
    };
  },

  created() {
      this.checkSession();
      this.fetchEvents();
  },

  methods: {
    fetchEvents() {
      fetch('https://hommukaxsylvester.ikt.khk.ee/api/kalender.php')
        .then(response => response.json())
        .then(data => {
          this.events = data;
        })
        .catch(error => {
          console.error('Error fetching events:', error);
        });
    },

    deleteItem(eventId) {
      fetch(`https://hommukaxsylvester.ikt.khk.ee/api/kalender.php?id=${eventId}`, {
        method: 'DELETE'
      })
      .then(response => {
        if (response.ok) {
          this.events = this.events.filter(event => event.Urituse_ID !== eventId);
          console.log('Item deleted successfully');
        } else {
          console.error('Error deleting item:', response.status);
        }
      })
      .catch(error => {
        console.error('Error deleting item:', error);
      });
    },

    addItem() {
      const formData = new FormData();
      formData.append('Pealkiri', this.newItem.title);
      formData.append('Tekst', this.newItem.description);
      formData.append('Korraldaja', this.newItem.organizer);
      formData.append('Kuupaev', this.newItem.date);
      formData.append('Pilt', this.newItem.image);
      
      fetch('https://hommukaxsylvester.ikt.khk.ee/api/kalender.php', {
        method: 'POST',
        body: formData
      })
      .then(response => {
        if (response.ok) {
          console.log('Item added successfully');
          this.showModal = false;
        } else {
          console.error('Error adding item:', response.status);
        }
      })
      .catch(error => {
        console.error('Error adding item:', error);
      });
    },
    
    handleFileUpload(event) {
      this.newItem.image = event.target.files[0];
    },

    checkSession() {
      fetch(`https://hommukaxsylvester.ikt.khk.ee/api/session.php`, {
        method: 'GET'
      })
      .then(response => {
        if (response.ok) {
          this.$router.push('/admin/dashboard');
        } else {
          this.$router.push('/admin');
        }
      })
      .catch(error => {
        console.error('%c⚠️ Error checking session:', 'color: red; font-weight: bold;');
        console.error('%c⚠️ Error:', 'color: blue;', error);
        console.timeEnd('checkSession');
      });
    },
    
    logout() {
      fetch(`https://hommukaxsylvester.ikt.khk.ee/api/session.php`, {
        method: 'DELETE'
      })
      .then(response => {
        if (response.ok) {
          this.$router.push('/admin');
        } else {
          console.error('Error logging out:', response.status);
        }
      })
      .catch(error => {
        console.error('Error logging out:', error);
      });
    }
  },
};
</script>
