<template>
  <div>
    <Navbar />
    <div class="bg-gray-100 font-montserrat min-h-screen py-8">
      <div class="max-w-4xl mx-auto">
        <h2 class="text-2xl font-bold mb-4">Kontakt</h2>
        <div class="flex flex-wrap">
          <div class="w-full sm:w-1/3 mb-4 sm:pl-4">
            <h3 class="text-xl font-bold mb-2">Üldinfo</h3>
            <ul>
              <li>Telefon: +372 7 361 810</li>
              <li>Postiaadress: Kopli 1, 50115 Tartu</li>
              <li>E-post: info@voco.ee</li>
              <li>Registrikood: 75024308</li>
              <li>KMKR nr: EE100786499</li>
              <li>Tartu Rakenduslikule Kolledžile  <br> saab esitada üksnes e-arveid.</li>
            </ul>
          </div>
          <div class="w-full sm:w-1/3 mb-4 sm:pl-4">
            <h3 class="text-xl font-bold mb-2">Kopli tänava õppekorpus</h3>
            <ul>
              <li>Telefon: +372 7 361 810</li>
              <li>Aadress: Kopli 1, 50115 Tartu</li>
            </ul>
          </div>
          <div class="w-full sm:w-1/3 mb-4 sm:pl-4">
            <h3 class="text-xl font-bold mb-2">Põllu tänava õppekorpus</h3>
            <ul>
              <li>Telefon: +372 7 361 979</li>
              <li>Aadress: Põllu 11A, 50303 Tartu</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <Footer />
  </div>
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
