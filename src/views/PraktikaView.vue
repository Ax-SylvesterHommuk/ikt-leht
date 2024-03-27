<template>
  <Navbar />
  <div class="bg-gray-100 font-montserrat min-h-screen py-8">
    <div class="max-w-4xl mx-auto">
      <h2 class="text-2xl font-bold mb-4">Praktika</h2>
      <p class="text-lg text-gray-700">VOCO pakub praktilisi koolitusi, et valmistada õpilasi ette tööeluks. Meie praktikaprogrammide eesmärk on anda õpilastele praktiline kogemus ning võimalus rakendada õpitut reaalsetes projektides.</p>
      <p class="text-lg text-gray-700 mt-4">Tutvu meie <a href="https://moodle.edu.ee/course/view.php?id=16481" class="text-blue-500 underline">praktikavõimalustega</a> Moodle'is.</p>
      <p class="text-lg text-gray-700 mt-4">Lisainfo VÕTA kohta leiate siit: <a href="https://voco.ee/oppetoo/vota/" class="text-blue-500 underline">VÕTA - Varasema Õpi- ja Töökogemuse Arvestamine</a></p>
    </div>
    <div class="bg-gray-100 flex flex-col items-center justify-center">
      <img src="../assets/Praktikaprotsess VOCOs.png" alt="Praktika" class="w-full md:w-3/4 lg:w-1/2 xl:w-2/3 mt-8">
    </div>
  </div>

  <Footer />
</template>

<script>
import Navbar from '@/components/Navbar.vue';
import Footer from '@/components/Footer.vue';

export default {
  components: {
    Navbar,
    Footer,
  }
}
</script>
