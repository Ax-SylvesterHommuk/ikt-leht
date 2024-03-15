<template>
  <div>
    <Navbar/>
    <div class="max-w-4xl mx-auto mt-8" v-if="event">
      <h1 class="text-3xl font-bold font-montserrat mb-4">{{ event.Pealkiri }}</h1>
      <p class="text-gray-600 font-montserrat">
        <strong>Kuupäev:</strong> {{ formatDate(event.Kuupaev) }}
      </p>
      <p class="text-gray-600 font-montserrat mb-8"><strong>Korraldaja:</strong> {{ event.Korraldaja }}</p>
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
      // Commented out for localhost development
      fetch(`https://hommukaxsylvester.ikt.khk.ee/api/kalender.php?id=${eventId}`)
          .then(response => response.json())
          .then(data => {
            this.event = data[0];
          })
          .catch(error => {
            console.error('Error fetching event details:', error);
          });
      /*
      // Example data for localhost development
      const exampleData = [{"Urituse_ID":"1","Pealkiri":"VOCO Liikumine","Tekst":"Jooksmine","Korraldaja":"VOCO","Kuupaev":"2024-02-01"},{"Urituse_ID":"3","Pealkiri":"SULED SAHISEVAD","Tekst":"VOCO MEISTRIV\u00d5ISTLUSED SULGPALLIS","Korraldaja":"Silvar R\u00fcckenberg","Kuupaev":"2024-01-25"},{"Urituse_ID":"5","Pealkiri":"asdasd","Tekst":"assdasd","Korraldaja":"asdadsasd","Kuupaev":"2024-02-07"},{"Urituse_ID":"6","Pealkiri":"Aasta Tegija 2015","Tekst":"2015 aasta AT","Korraldaja":"IT","Kuupaev":"2024-03-13"},{"Urituse_ID":"7","Pealkiri":"Huge big massive \u00fcritus","Tekst":"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Aenean euismod elementum nisi quis eleifend. Dictum at tempor commodo ullamcorper a. Rhoncus aenean vel elit scelerisque. Facilisi nullam vehicula ipsum a. Est lorem ipsum dolor sit amet consectetur. Curabitur vitae nunc sed velit dignissim sodales ut eu sem. Nunc mi ipsum faucibus vitae aliquet nec ullamcorper sit. Erat imperdiet sed euismod nisi porta lorem mollis aliquam. Curabitur gravida arcu ac tortor dignissim convallis aenean et tortor. Eu lobortis elementum nibh tellus molestie nunc non. Amet cursus sit amet dictum sit. Congue nisi vitae suscipit tellus mauris a diam maecenas. Donec adipiscing tristique risus nec feugiat in fermentum posuere. Ac placerat vestibulum lectus mauris ultrices eros in cursus. Neque vitae tempus quam pellentesque nec nam aliquam. Sagittis eu volutpat odio facilisis mauris sit amet massa. Ipsum faucibus vitae aliquet nec. Id nibh tortor id aliquet lectus proin nibh nisl.\r\n\r\nMalesuada fames ac turpis egestas integer. Cras tincidunt lobortis feugiat vivamus at augue eget arcu dictum. Pellentesque elit eget gravida cum sociis natoque penatibus. Ultrices neque ornare aenean euismod elementum nisi quis eleifend. Consectetur adipiscing elit duis tristique sollicitudin nibh sit amet. At imperdiet dui accumsan sit amet. Viverra accumsan in nisl nisi. Sed libero enim sed faucibus turpis in. Integer eget aliquet nibh praesent tristique magna sit amet. Nisl nunc mi ipsum faucibus vitae. Varius duis at consectetur lorem. Ornare aenean euismod elementum nisi quis eleifend. Cras tincidunt lobortis feugiat vivamus at augue. Maecenas ultricies mi eget mauris pharetra et. Imperdiet nulla malesuada pellentesque elit eget gravida cum. Suspendisse sed nisi lacus sed. Tempor orci eu lobortis elementum nibh tellus.","Korraldaja":"IT Akadeemia","Kuupaev":"2024-03-28"}]

      // Find the event in the example data based on eventId
      const selectedEvent = exampleData.find(event => event.Urituse_ID === eventId);

      if (selectedEvent) {
        this.event = selectedEvent;
      } else {
        console.error('Event not found in example data');
      }
      */
    },
  },
  created() {
    const eventId = this.$route.params.id;
    this.fetchEventData(eventId);
  },
};
</script>
