<template>
    <Navbar />
    <div class="bg-gray-100 font-montserrat min-h-screen py-8 flex">
        <!-- Sidebar -->
        <div class="w-1/4"></div>
        <div>
            <ul class="text-lg text-left">
                <li v-for="(tab, index) in tabs" :key="index">
                    <a href="#"
                        class="border border-gray-300 py-2 px-4 w-64 block hover:bg-gray-200 hover:border-gray-400 transition duration-300 ease-in-out"
                        @click="currentTab = tab">{{ tab.title }}</a>
                </li>
            </ul>
        </div>
        <!-- Content -->
        <div class="w-2/4">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-3xl font-bold mb-12">{{ currentTab.title }}</h2>

                <p v-html="formattedContent" class="text-lg text-black w-[875px] leading-8 whitespace-break-spaces"></p>
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

            // Replace embedded URLs
            content = content.replace(/\[(.*?)\]\((.*?)\)/g, '<a href="$2" class="text-black underline hover:text-gray-700 hover:underline cursor-pointer">$1</a>');

            return content;
        }
    }
};
</script>