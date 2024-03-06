<template>
  <div>
    <Navbar/>
    <div class="max-w-4xl mx-auto mt-8" v-if="event">
      <h1 class="text-3xl font-bold font-montserrat mb-4">{{ event.Pealkiri }}</h1>
      <p class="text-gray-600 font-montserrat mb-8">
        <strong>Kuupäev:</strong> {{ formatDate(event.Kuupaev) }}
      </p>
      <p class="text-lg font-montserrat">{{ event.Tekst }}</p>
    </div>
    <Footer/>
  </div>
</template>

<script>
import Navbar from '@/components/Navbar.vue';
import Footer from '@/components/Footer.vue';
import dayjs from 'dayjs';

export default {
  components: {
    Navbar,
    Footer,
  },
  data() {
    return {
      event: null,
    };
  },
  methods: {
    formatDate(date) {
      return dayjs(date).locale('et').format('D. MMMM YYYY').replace(/^./, match => match.toUpperCase());
    },
    fetchEventData(eventId) {
      fetch(`https://hommukaxsylvester.ikt.khk.ee/api/kalender.php?id=${eventId}`)
          .then(response => response.json())
          .then(data => {
            this.event = data[0];
          })
          .catch(error => {
            console.error('Error fetching event details:', error);
          });
    },
  },
  created() {
    const eventId = this.$route.params.id;
    this.fetchEventData(eventId);
  },
};
</script>
