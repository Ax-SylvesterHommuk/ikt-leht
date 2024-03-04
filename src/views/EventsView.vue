<template>
  <div>
    <Navbar />
    <div class="bg-gray-100 min-h-screen py-8">
      <div class="max-w-4xl mx-auto">
        <h2 class="text-2xl font-bold font-montserrat mb-4">Üritused</h2>
        <ul>
          <li v-for="month in sortedMonths" :key="month">
            <h3 class="text-lg font-montserrat font-bold mt-4">{{ month }}</h3>
            <ul class="w-full">
              <li v-for="event in groupedEvents[month]" :key="event.Urituse_ID" class="bg-white shadow-md mb-4 cursor-pointer duration-150 ease-linear hover:bg-gray-200 flex items-center border border-[#afbacc] relative">
                <div class="w-[225px] flex-shrink-0 relative">
                  <img :src="event.Pilt" alt="Event Image" class="w-full h-full object-cover">
                </div>
                <div class="ml-4">
                  <p class="text-lg font-montserrat font-semibold">{{ event.Pealkiri }}</p>
                  <p class="text-gray-600 font-montserrat"><strong>Kuupäev:</strong> {{ formatDate(event.Kuupaev) }}</p>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
    <Footer />
  </div>
</template>

<script>
import Navbar from '@/components/Navbar.vue';
import Footer from '@/components/Footer.vue';
import dayjs from 'dayjs';
import 'dayjs/locale/et'; // Estonian locale

export default {
  components: {
    Navbar,
    Footer,
  },
  data() {
    return {
      events: [
        {
          "Urituse_ID": "1",
          "Kuupaev": "2024-02-01",
          "Pealkiri": "VOCO Liikumine",
          "Pilt": "https://voco.ee/wp-content/uploads/noorem-tarkvaraarendaja-veebispetsialist-659-3b4d2-518x293.jpg"
        },
        {
          "Urituse_ID": "3",
          "Kuupaev": "2024-01-25",
          "Pealkiri": "SULED SAHISEVAD",
          "Pilt": "https://voco.ee/wp-content/uploads/noorem-tarkvaraarendaja-veebispetsialist-659-3b4d2-518x293.jpg"
        },
        {
          "Urituse_ID": "5",
          "Kuupaev": "2024-02-07",
          "Pealkiri": "asdasd",
          "Pilt": "https://voco.ee/wp-content/uploads/noorem-tarkvaraarendaja-veebispetsialist-659-3b4d2-518x293.jpg"
        },
        {
          "Urituse_ID": "6",
          "Kuupaev": "2024-03-13",
          "Pealkiri": "Aasta Tegija 2015",
          "Pilt": "https://voco.ee/wp-content/uploads/noorem-tarkvaraarendaja-veebispetsialist-659-3b4d2-518x293.jpg"
        }
      ],
    };
  },
  computed: {
    groupedEvents() {
      const grouped = {};
      this.events.forEach(event => {
        const month = dayjs(event.Kuupaev).locale('et').format('MMMM YYYY');
        if (!grouped[month]) {
          grouped[month] = [];
        }
        grouped[month].push(event);
      });
      return grouped;
    },
    sortedMonths() {
      return Object.keys(this.groupedEvents).sort((a, b) => {
        const dateA = dayjs(a, 'MMMM YYYY').toDate();
        const dateB = dayjs(b, 'MMMM YYYY').toDate();
        return dateA - dateB;
      });
    }
  },
  created() {
    fetch('https://hommukaxsylvester.ikt.khk.ee/api/kalender.php')
      .then(response => response.json())
      .then(data => {
        this.events = data;
      })
      .catch(error => {
        console.error('Error fetching events:', error);
      });
  },
  methods: {
    viewEvent(eventId) {
      // @TODO: Implement single event view with more details
      console.log('View event', eventId);
    },
    formatDate(date) {
      return dayjs(date).locale('et').format('D. MMMM YYYY').replace(/^./, match => match.toUpperCase());
    }
  }
}
</script>