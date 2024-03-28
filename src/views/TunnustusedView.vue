<template>
    <Navbar />
    <div class="bg-gray-100 font-montserrat min-h-screen py-8 flex">
        <!-- Sidebar -->
        <div class="w-1/4"></div>
        <div>
            <ul class="text-lg text-left">
                <li>
                    <a href="#" class="border border-gray-300 py-2 px-4 w-64 block">Item 1</a>
                </li>
                <li>
                    <a href="#" class="border border-gray-300 py-2 px-4 w-64 block">Item 2</a>
                </li>
                <li>
                    <a href="#" class="border border-gray-300 py-2 px-4 w-64 block">Item 3</a>
                </li>
                <li>
                    <a href="#" class="border border-gray-300 py-2 px-4 w-64 block">Item 4</a>
                </li>
                <li>
                    <a href="#" class="border border-gray-300 py-2 px-4 w-64 block">Item 5</a>
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
