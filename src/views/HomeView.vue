<template>
  <Navbar/>
  <div class="w-full h-[651px] flex bg-[url('../assets/mainbg.png')] ">
    <div class="text-2xl text-white font-bold pt-60 pl-60">
      Tarkvaraarendus. Andmeanalüüs. Küberjulgeolek. <br><br>
      Uuri põnevat maailma IT erialade ja võimaluste osas ning liigu edasi VOCO rütmis.
    </div>
  </div>
  <Footer/>
</template>

<script>
import Navbar from '@/components/Navbar.vue';
import Footer from '@/components/Footer.vue';

export default {
  components: {
    Navbar,
    Footer
  }
}
</script>