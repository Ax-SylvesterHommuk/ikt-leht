<template>
  <div class="font-montserrat font-medium w-full bg-white py-3 p-[1.25rem]">
    <div class="container mx-auto flex items-center justify-between">
      <div class="flex items-center space-x-2 ml-36">
        <FacebookIcon class="text-black hover:text-[#c8d1e0] cursor-pointer h-6 w-6"/>
        <TiktokIcon class="text-black hover:text-[#c8d1e0] cursor-pointer h-6 w-6"/>
        <InstagramIcon class="text-black hover:text-[#c8d1e0] cursor-pointer h-6 w-6"/>
      </div>
      <div class="flex items-center space-x-4 mr-32 text-[0.875rem]">
        <button class="text-black transition-colors hover:text-[#c8d1e0] ease-in-out duration-200 px-3">Kontakt</button>
        <button class="text-black transition-colors hover:text-[#c8d1e0] ease-in-out duration-200 px-3">Tunniplaan</button>
        <button class="text-black transition-colors hover:text-[#c8d1e0] ease-in-out duration-200 px-3">Siseveeb</button>
      </div>
    </div>
  </div>
  <div class="font-montserrat font-medium w-full bg-black py-5 p-[1.25rem] shadow-xl shadow-black">
    <div class="container mx-auto flex items-center justify-between">
      <div class="flex items-center">
        <img src="../assets/it_kool.png" alt="Logo" class="h-[75px] cursor-pointer ml-40">
      </div>
      <div class="flex items-center space-x-4 mr-32 text-[0.875rem]">
        <button class="text-white hover:text-[#c8d1e0] ease-in-out duration-200 px-3 py-1">Button 1</button>
        <button class="text-white hover:text-[#c8d1e0] ease-in-out duration-200 px-3 py-1">Button 2</button>
        <button class="text-white hover:text-[#c8d1e0] ease-in-out duration-200 px-3 py-1">Button 3</button>
        <button class="text-white hover:text-[#c8d1e0] ease-in-out duration-200 px-3 py-1">Button 4</button>
        <button class="text-white hover:text-[#c8d1e0] ease-in-out duration-200 px-3 py-1">Button 5</button>
        <button class="text-white hover:text-[#c8d1e0] ease-in-out duration-200 px-3 py-1">Button 6</button>
      </div>
    </div>
  </div>
</template>

<script>
import FacebookIcon from '@/components/icons/Facebook.vue';
import TiktokIcon from '@/components/icons/Tiktok.vue';
import InstagramIcon from '@/components/icons/Instagram.vue';

export default {
  components: {
    FacebookIcon,
    TiktokIcon,
    InstagramIcon
  }
}
</script>