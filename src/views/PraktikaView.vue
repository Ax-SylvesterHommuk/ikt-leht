<template>
  <Navbar />
   <div>
    <h1>Praktika</h1>
    <p>Siin on praktika leht!</p>
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