<template>
  <Navbar />
  <div class="w-full h-[900px] flex relative">
    <!-- Image with overlay -->
    <div class="w-full h-full bg-[url('../assets/mainbg.jpg')] bg-cover bg-center absolute z-0"></div>

    <!-- Dark overlay -->
    <div class="w-full h-full bg-black opacity-65 absolute z-10"></div>

    <!-- Text content -->
    <div class="w-full h-full flex items-center justify-center absolute z-20">
      <div class="text-4xl text-white font-bold text-center">
        Tarkvaraarendus. Andmeanalüüs. Küberjulgeolek. <br><br>
        Uuri põnevat maailma IT erialade ja võimaluste osas ning liigu edasi VOCO rütmis.
      </div>
    </div>
  </div>


  <div class="md:h-[850px] h-[650px] bg-[#f5f7fa] flex relative">
    <!-- Text content -->
    <div class="text-black md:text-xl lg:text-2xl xl:text-3xl font-montserrat font-bold mt-20 pl-4 md:pl-40 ml-2 md:ml-44 pt-40 pr-4 md:pr-20 w-full md:w-1/2 h-auto relative z-10">
      Meie eesmärk on pakkuda tipptasemel IT-haridust, kus ühendatakse teadmised ja praktiline kogemus. <br><br>Tutvu meie
      sündmuste kalendriga ja astu sisse IT maailma rütmis!
    </div>

    <!-- Image container -->
    <div class="hidden md:block w-full md:w-[50%] md:mt-12 relative overflow-hidden items-center justify-center">
      <img src="../assets/html_js_css.png" alt="" class="w-full h-auto object-cover">
    </div>

    <!-- Background image -->
    <img src="../assets/voco muster RGB-02.png" alt="" class="md:mx-16 md:my-16 my-52 absolute scale-105 bottom-0 w-[739px] h-auto opacity-25">
  </div>

  <Calendar class="hidden md:block pt-72 pb-72" />
  <Footer />
</template>

<script>
import Navbar from '@/components/Navbar.vue';
import Footer from '@/components/Footer.vue';
import Calendar from '@/components/Calendar.vue';

export default {
  components: {
    Navbar,
    Footer,
    Calendar
  }
}
</script>