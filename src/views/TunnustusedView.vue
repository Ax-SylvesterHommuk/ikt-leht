<template>
  <Navbar />
  <div class="bg-gray-100 font-montserrat min-h-screen py-8 flex">
    <!-- Sidebar -->
    <div class="w-1/4"></div>
    <div>
      <ul class="text-lg text-left">
        <li>
          <a href="#" class="border border-gray-300 py-2 px-4 w-64 block hover:bg-gray-200 hover:border-gray-400 transition duration-300 ease-in-out">Meie autahvel</a>
        </li>
        <li>
          <a href="#" class="border border-gray-300 py-2 px-4 w-64 block hover:bg-gray-200 hover:border-gray-400 transition duration-300 ease-in-out">Meie Meister</a>
        </li>
        <li>
          <a href="#" class="border border-gray-300 py-2 px-4 w-64 block hover:bg-gray-200 hover:border-gray-400 transition duration-300 ease-in-out">Aasta õpetajad</a>
        </li>
        <li>
          <a href="#" class="border border-gray-300 py-2 px-4 w-64 block hover:bg-gray-200 hover:border-gray-400 transition duration-300 ease-in-out">Tänukirjad</a>
        </li>
        <li>
          <a href="#" class="border border-gray-300 py-2 px-4 w-64 block hover:bg-gray-200 hover:border-gray-400 transition duration-300 ease-in-out">Õppijate saavutused</a>
        </li>
      </ul>
    </div>
    <!-- Content -->
    <div class="w-2/4">
      <div class="max-w-4xl mx-auto">
        <h2 class="text-3xl font-bold mb-4">Tunnustused</h2>
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
