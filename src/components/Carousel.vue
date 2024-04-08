<template>
  <div>
    <swiper :slides-per-view="1.5" :space-between="50" :pagination="{ clickable: true }">
      <swiper-slide class="swiper-slide-box">
        <div class="flex justify-center items-center">
          <img src="../assets/tarkvara.jpg">
        </div>
      </swiper-slide>
      <swiper-slide class="swiper-slide-box">
        <div class="flex justify-center items-center">
          <img src="../assets/tarkvaraarendus.jpg">
        </div>
      </swiper-slide>
      <swiper-slide class="swiper-slide-box">
        <div class="flex justify-center items-center">
          <img src="../assets/nooremt.jpg">
        </div>
      </swiper-slide>
      <swiper-slide class="swiper-slide-box">
        <div class="flex justify-center items-center">
          <img src="../assets/arikool.png" alt="Arikool Image">
        </div>
      </swiper-slide>
    </swiper>
  </div>
</template>

<script>
import { Swiper, SwiperSlide } from 'swiper/vue';
import 'swiper/css';
import 'swiper/css/pagination';

export default {
  components: {
    Swiper,
    SwiperSlide,
  },
};
</script>

<style scoped>
.swiper-slide-box {
  border: 1px solid #ccc;
  background-color: #fff;
}

/* Additional styles to align images */
.swiper-slide-box img {
  max-width: 100%; /* Ensure images don't exceed container width */
}
</style>
