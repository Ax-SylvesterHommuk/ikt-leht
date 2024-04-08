<template>
    <Navbar />
    <div class="font-montserrat min-h-screen py-8 flex flex-wrap mt-12">
        <!-- Sidebar -->
        <div class="pr-[350px]"></div>
        <div>
            <ul class="text-lg text-left m-0 pl-[0.875rem] pr-[0.875rem] pt-[0.75rem] pb-[0.75rem] list-none">
                <li v-for="(tab, index) in tabs" :key="index" class="relative">
                    <a href="#"
                        class="border border-gray-300 py-2 px-4 w-64 block hover:bg-gray-200 hover:border-gray-400 transition duration-300 ease-in-out"
                        @click="currentTab = tab">{{ tab.title }}</a>
                </li>
            </ul>
        </div>
        <!-- Content -->
        <div class="pl-[1.25rem]">
            <div>
                <h2 class="text-3xl font-bold mb-12">{{ currentTab.title }}</h2>

                <p v-html="formattedContent" class="text-lg text-black w-auto leading-8 whitespace-break-spaces"></p>
            </div>
        </div>
    </div>

    <Footer />
</template>

<script>
import Navbar from '@/components/Navbar.vue';
import Footer from '@/components/Footer.vue';

import autahvel from '../helper/tabs/autahvel';
import meister from '../helper/tabs/meister';
import opetajad from '../helper/tabs/opetajad';
import tankirjad from '../helper/tabs/tankirjad';
import saavutused from '../helper/tabs/saavutused';

export default {
    components: {
        Navbar,
        Footer,
    },
    data() {
        return {
            tabs: [autahvel, meister, opetajad, tankirjad, saavutused],
            currentTab: autahvel,
        };
    },
  computed: {
    formattedContent() {
      // Replace **bold** text
      let content = this.currentTab.content.replace(/\*\*(.*?)\*\*/g, '<strong class="text-black">$1</strong>');

      // Replace *semi-bold* text
      content = content.replace(/\*(.*?)\*/g, '<span class="font-semibold">$1</span>');

      // Replace embedded URLs
      content = content.replace(/\[(.*?)\]\((.*?)\)/g, '<a href="$2" class="text-black underline hover:text-gray-700 hover:underline cursor-pointer">$1</a>');

      return content;
    }
  }

};
</script>