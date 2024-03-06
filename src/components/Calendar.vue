<template>
  <div class="font-montserrat font-semibold mx-4 md:mx-96">
    <div class="grid gap-2 z-10">
      <div class="flex mx-auto gap-4 md:gap-24 text-center">
        <button class="text-md md:text-xl font-bold" @click="shiftMonth(-1)">Eelmine</button>
        <button class="text-md md:text-xl font-bold" @click="reset()">Täna</button>
        <button class="text-md md:text-xl font-bold" @click="shiftMonth(1)">Järgmine</button>
      </div>
      <span class="text-lg md:text-3xl text-left">{{ viewDate.format('MMMM YYYY') }}</span>
    </div>

    <!-- Week days -->
    <div class="grid grid-cols-7 gap-1">
      <div v-for="day in weekDays" class="text-center text-[11px]">{{ day }}</div>
    </div>

    <!-- Calendar days -->
    <div class="grid grid-cols-7">
      <div v-for="emptySlot in daystoPrepend"></div>
      <div class="border border-slate-200 flex flex-col h-[6vw] md:h-[8vw] lg:h-[10vw]" v-for="date in units">
        <div :class="[date.isToday() ? 'bg-gray-300' : '']" class="text-center text-sm md:text-base">{{ date.format('D') }}</div>
        <div class="events">
          <!-- Display events for this date -->
          <div v-for="event in getEventsForDate(date)" :key="event.id">
            <p>{{ event.Pealkiri }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import dayjs from 'dayjs';
import isToday from 'dayjs/plugin/isToday';

dayjs.extend(isToday);

export default {
  data() {
    return {
      viewDate: dayjs(),
      weekDays: ['Pühapäev', 'Esmaspäev', 'Teisipäev', 'Kolmapäev', 'Neljapäev', 'Reede', 'Laupäev'],
      events: []
    };
  },
  computed: {
    daystoPrepend() {
      const startOfMonth = this.viewDate.startOf("month");
      const startOfFirstWeek = startOfMonth.startOf("week");
      const daysToFirstDay = startOfMonth.diff(startOfFirstWeek, "day");
      return Array.from(new Array(daysToFirstDay).keys());
    },
    
    units() {
      const ranges = [];
      const startOfRange = this.viewDate.startOf('month').add(-1, 'day');
      const endOfRange = this.viewDate.endOf('month').add(-1, 'day');
      let currentDate = startOfRange;

      while (currentDate.isBefore(endOfRange) || currentDate.isSame(endOfRange)) {
        currentDate = currentDate.add(1, 'day');
        ranges.push(currentDate);
      }
      return ranges;
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
    shiftMonth(amount) {
      this.viewDate = this.viewDate.add(amount, 'month');
    },

    reset() {
      this.viewDate = dayjs();
    },

    getEventsForDate(date) {
      return this.events.filter(event => dayjs(event.Kuupaev).isSame(date, 'day'));
    }
  }
};
</script>