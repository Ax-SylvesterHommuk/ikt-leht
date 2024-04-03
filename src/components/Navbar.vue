<template>
  <!-- Navbar for desktop -->
  <div class="hidden md:block font-montserrat font-medium w-full bg-white py-3 p-[1.25rem]">
    <div class="container mx-auto flex items-center justify-between">
      <div class="flex items-center space-x-2 ml-36">
        <FacebookIcon class="text-black hover:text-[#c8d1e0] cursor-pointer h-6 w-6"/>
        <TiktokIcon class="text-black hover:text-[#c8d1e0] cursor-pointer h-6 w-6"/>
        <InstagramIcon class="text-black hover:text-[#c8d1e0] cursor-pointer h-6 w-6"/>
      </div>
      <div class="flex items-center space-x-4 mr-32 text-[0.875rem]">
        <a class="text-black transition-colors hover:text-[#c8d1e0] ease-in-out duration-200 px-3" href="https://voco.ee/kontakt/" target="_blank">Kontakt</a>
        <a class="text-black transition-colors hover:text-[#c8d1e0] ease-in-out duration-200 px-3 cursor-pointer" @click="sendRoute('/tunniplaan');">Tunniplaan</a>
        <a class="text-black transition-colors hover:text-[#c8d1e0] ease-in-out duration-200 px-3" href="https://siseveeb.voco.ee" target="_blank">Siseveeb</a>
      </div>
    </div>
  </div>
  <div class="hidden md:block font-montserrat font-medium w-full bg-black py-5 p-[1.25rem]">
    <div class="container mx-auto flex items-center justify-between">
      <div class="flex items-center">
        <img src="../assets/voco-t2ispikk-logo_valge.svg" alt="Logo" class="h-[75px] cursor-pointer ml-40" @click="this.$router.push('/');">
      </div>
      <div class="flex items-center space-x-4 mr-32 text-[0.875rem]">
        <a href="https://siseveeb.voco.ee/kutseope/oppetoo/konsultatsioonid" class="text-white hover:text-[#c8d1e0] ease-in-out duration-200 px-3 py-1">Konsultatsioonid</a>
        <button class="text-white hover:text-[#c8d1e0] ease-in-out duration-200 px-3 py-1" @click="sendRoute('/praktika')">Praktika</button>
        <button class="text-white hover:text-[#c8d1e0] ease-in-out duration-200 px-3 py-1" @click="sendRoute('/erialad');">Erialad</button>
        <button class="text-white hover:text-[#c8d1e0] ease-in-out duration-200 px-3 py-1">Kutsemeistrivõistlused</button>
        <button class="text-white hover:text-[#c8d1e0] ease-in-out duration-200 px-3 py-1" @click="sendRoute('/tunnustused');">Tunnustused</button>
        <button class="text-white hover:text-[#c8d1e0] ease-in-out duration-200 px-3 py-1" @click="sendRoute('/uritused')">Üritused</button>
      </div>
    </div>
  </div>

  <!-- Navbar for mobile -->
  <div class="relative md:hidden font-montserrat font-medium w-full bg-black py-3 p-[1.25rem] z-50">
    <div class="container mx-auto flex items-center justify-between">
      <div class="flex items-center">
        <img src="../assets/voco-t2ispikk-logo_valge.svg" alt="Logo" class="h-[75px] cursor-pointer ml-2 md:ml-40" @click="this.$router.push('/');">
      </div>
      <!-- Burger menu for mobile -->
      <button class="text-white hover:text-[#c8d1e0] ease-in-out duration-200 px-3 py-1 md:hidden" @click="toggleMenu">
        <BurgerMenu />
      </button>
    </div>
    
    <!-- Mobile menu overlay -->
    <div class="absolute inset-x-0 top-full bg-white w-full py-4 md:hidden" :class="{ 'block': isMenuOpen, 'hidden': !isMenuOpen }">
      <!-- * Menus -->
      <a href="https://siseveeb.voco.ee/kutseope/oppetoo/konsultatsioonid" class="block text-black text-center py-2">Konsultatsioonid</a>
      <a href="#" class="block text-black text-center py-2" @click="sendRoute('/praktika')">Praktika</a>
      <a class="text-white hover:text-[#c8d1e0] ease-in-out duration-200 px-3 py-1" @click="this.$router.push('/tunniplaan');">Tunniplaan</a>
      <a class="text-white hover:text-[#c8d1e0] ease-in-out duration-200 px-3 py-1" @click="this.$router.push('/erialad');">Erialad</a>
      <a href="#" class="block text-black text-center py-2">Kutsemeistrivõistlused</a>
      <a href="#" class="block text-black text-center py-2">Tunnustused</a>
      <a href="#" class="block text-black text-center py-2" @click="sendRoute('/uritused')">Üritused</a>
    </div>
  </div>
</template>

<script>
import FacebookIcon from '@/components/icons/Facebook.vue';
import TiktokIcon from '@/components/icons/Tiktok.vue';
import InstagramIcon from '@/components/icons/Instagram.vue';
import BurgerMenu from '@/components/icons/BurgerMenu.vue';

export default {
  components: {
    FacebookIcon,
    TiktokIcon,
    InstagramIcon,
    BurgerMenu
  },
  data() {
    return {
      isMenuOpen: false
    }
  },
  methods: {
    toggleMenu() {
      this.isMenuOpen = !this.isMenuOpen;
    },
    sendRoute(route) {
      this.$router.push(route);
    }
  }
}
</script>