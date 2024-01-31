<template>
    <div class="flex grid gap-2 z-10">
        <div class="flex mx-auto gap-24 text-center">
        <button class="text-xl font-bold"
                @click="reset()">Today</button>
        <button class="text-xl font-bold"
                @click="shiftMonth(-1)">Previous</button>
        <button class="text-xl font-bold"
                @click="shiftMonth(1)">Next</button>
        </div>
        <span class="text-3xl text-left">{{ viewDate.format('MMMM YYYY') }}</span>
      </div>

    <!-- Week days -->
    <div class="grid grid-cols-7 gap-1">
      <div v-for="day in weekDays" class="text-center">{{ day }}</div>
    </div>

    <!-- Calendar days -->
    <div class="grid grid-cols-7">
      <div v-for="emptySlot in daystoPrepend"></div>
      <div class="border border-slate-200 flex flex-col h-32" v-for="date in units">
        <div :class="[date.isToday() ? 'bg-red-300' : '']" class="text-center">{{ date.format('D') }}</div>
        <div class="events">
          <!-- Display events for this date -->
          <div v-for="event in getEventsForDate(date)">
            <p>{{ event.Pealkiri }}</p>
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