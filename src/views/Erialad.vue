<template>
  <Navbar />
  <div class="bg-gray-100 font-montserrat min-h-screen py-8">
    <div class="max-w-4xl mx-auto">
      <h2 class="text-2xl font-bold mb-4">Erialad</h2>
      <p class="text-lg text-gray-700">VOCO IT Akadeemia koosneb kahest osast: Ärikool ja IT kool, vali endale sobiv eriala nende listist.</p>

      <!-- Add images here -->
      <div class="flex flex-col justify-center">
        <a href="https://voco.ee/kool/arikool/" target="_blank" rel="noopener noreferrer">
          <img src="../assets/arikool.png" alt="Ärikool" class="mr-2">
        </a>
        <a href="https://voco.ee/kool/it-kool/" target="_blank" rel="noopener noreferrer">
          <img src="../assets/itkool.png" alt="IT kool" class="ml-2">
        </a>
      </div>
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
