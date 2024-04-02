<template>
  <Navbar />
  <div class="bg-white shadow-md rounded-lg p-4">
    <h1 class="text-3xl font-semibold mb-4 text-center">Tunniplaan</h1>
    <div v-if="loading" class="text-center">Loading...</div>
    <div v-else>
      <div class="flex justify-between mb-4">
        <button @click="goToPreviousWeek" class="px-4 py-2 bg-gray-200 rounded-md">Eelmine nädal</button>
        <select v-model="selectedGroup" @change="fetchTimetable" class="px-4 py-2 bg-gray-200 rounded-md">
          <option value="ITA20:1529">ITA20 Tarkvaraarendaja</option>
          <option value="ITA21:1583">ITA21 Tarkvaraarendaja</option>
          <option value="ITA22:1692">ITA22 Tarkvaraarendaja</option>
          <option value="ITA23:1844">ITA23 Tarkvaraarendaja</option>
          <option value="ITA24:1950">ITA24 Tarkvaraarendaja</option>
        </select>
        <button @click="goToNextWeek" class="px-4 py-2 bg-gray-200 rounded-md">Järgmine nädal</button>
      </div>
      <table class="w-full border-collapse border border-gray-200">
        <thead>
        <tr class="bg-gray-100">
          <th class="border border-gray-200 px-4 py-2">Aeg</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="(dayData, day) in timetable" :key="day" class="border border-gray-200 flex-col flex">
          <td class="border border-gray-200 px-4 py-2 font-semibold">{{ day }}</td>
          <td v-for="tund in dayData" :key="tund.tund" class="border border-gray-200">
            <td class="border border-gray-200 px-4 py-2">{{ tund.algus }} - {{ tund.lopp }}</td>
            <td class="border border-gray-200 px-4 py-2">{{ tund.aine }}</td>
            <td class="border border-gray-200 px-4 py-2">{{ tund.opetaja }}</td>
            <td class="border border-gray-200 px-4 py-2">{{ tund.ruum || 'Ruum puudub' }}</td> <!-- Added fallback text -->
          </td>
        </tr>
        </tbody>
      </table>
    </div>
  </div>
  <Footer />
</template>

<script>
import Navbar from "@/components/Navbar.vue";
import Footer from "@/components/Footer.vue";

export default {
  components: {
    Navbar,
    Footer,
  },
  data() {
    return {
      loading: true,
      timetable: {},
      currentWeekStart: new Date(), // Initialize with the current date
      selectedGroup: "ITA21:1583", // Default selected group
    };
  },
  mounted() {
    this.setCurrentWeekStart();
    this.fetchTimetable();
  },
  methods: {
    async fetchTimetable() {
      try {
        const formattedDate = this.currentWeekStart.toISOString().split('T')[0];
        const [groupName, groupId] = this.selectedGroup.split(":");
        const response = await fetch(`https://siseveeb.voco.ee/veebilehe_andmed/tunniplaan?nadal=${formattedDate}&grupp=${groupId}`);
        if (!response.ok) {
          throw new Error('Failed to fetch timetable');
        }
        const data = await response.json();
        this.timetable = data.tunnid;
        this.loading = false;
      } catch (error) {
        console.error('Error fetching timetable:', error);
        this.loading = false;
      }
    },
    setCurrentWeekStart() {
      // Set the current week start to the first day of the current week (Monday)
      const today = new Date();
      const dayOfWeek = today.getDay();
      const diff = today.getDate() - dayOfWeek + (dayOfWeek === 0 ? -6 : 1); // Adjust when day is Sunday
      this.currentWeekStart = new Date(today.setDate(diff));
    },
    formatDate(dateString) {
      const date = new Date(dateString);
      return date.toLocaleDateString('et-EE', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });
    },
    goToPreviousWeek() {
      this.currentWeekStart.setDate(this.currentWeekStart.getDate() - 7);
      this.fetchTimetable();
    },
    goToNextWeek() {
      this.currentWeekStart.setDate(this.currentWeekStart.getDate() + 7);
      this.fetchTimetable();
    }
  }
}
</script>
