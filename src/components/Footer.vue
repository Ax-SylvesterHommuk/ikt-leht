<template>
  <footer class="font-montserrat font-medium bg-black py-12 text-[1rem]">
    <div class="container mx-auto flex items-center justify-between">
      <img src="../assets/voco_it_kool_logo.svg" alt="Logo" class="h-[102px] cursor-pointer ml-40" @click="this.$router.push('/');">
      
      <div class="flex flex-col space-y-6 mr-72">
        <div class="flex items-center gap-12">
          <div class="flex flex-col mr-6">
            <h2 class="text-white text-[16px] font-bold mb-4">Kontakt</h2>
            <div class="font-medium text-[14px] text-white flex flex-col space-y-2">
              <a href="mailto:signe.vedler@voco.ee" class="hover:text-[#c8d1e0] ease-in-out duration-200">signe.vedler@voco.ee</a>
              <a href="tel:5 178 966" class="hover:text-[#c8d1e0] ease-in-out duration-200">5 178 966</a>
            </div>
          </div>
          
          <div class="flex flex-col mr-6">
            <h2 class="text-white text-[16px] font-bold mb-4">VOCO IT-Kool</h2>
            <div class="font-medium text-[14px] text-white flex flex-col space-y-2">
                <h1>Kopli 1A</h1>
                <h1>Tartu 50115</h1>
            </div>
          </div>

          <div class="flex flex-col mr-6">
            <h2 class="text-white text-[16px] font-bold mb-4">Privaatsustingimused</h2>
            <div class="font-medium text-[14px] text-white flex flex-col space-y-2">
              <a href="https://voco.ee/andmekaitse-info/" class="hover:text-[#c8d1e0] ease-in-out duration-200">Andmekaitse</a>
              <a href="https://voco.ee/kupsised/" class="hover:text-[#c8d1e0] ease-in-out duration-200">Küpsised</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <div class="bg-white font-montserrat font-semibold text-[14px] text-center py-4">
      <p>© TARTU RAKENDUSLIK KOLLEDŽ 2024</p>
    </div>
</template>