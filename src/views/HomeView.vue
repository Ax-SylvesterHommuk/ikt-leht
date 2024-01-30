<template>
    <Navbar/>
    <div class="w-full h-[651px] flex bg-[url('../assets/mainbg.png')] ">
        <div class="text-2xl text-white font-bold pt-60 pl-60">
            Tarkvaraarendus. Andmeanalüüs. Küberjulgeolek. <br><br>
            Uuri põnevat maailma IT erialade ja võimaluste osas ning liigu edasi VOCO rütmis.
        </div>
    </div>
    <div class="h-[650px] bg-gray-100 flex">
        <div class="text-4xl text-black font-bold pl-40 pt-40 pr-20 w-1/2 h-[539px] bg-[url('../assets/voco.png')]">
            Meie eesmärk on pakkuda tipptasemel IT-haridust, kus ühendatakse teadmised ja praktiline kogemus. <br><br>Tutvu meie sündmuste kalendriga ja astu sisse IT maailma rütmis!
        </div>
        <img src="/src/assets/html.png" alt="" class="w-1/3 h-[539px] pl-40">
    </div>
    <calendar/>
    <Footer/>
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