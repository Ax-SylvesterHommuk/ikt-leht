<template>
    <div class="font-montserrat min-h-screen flex items-center justify-center bg-gray-100">
        <div class="bg-white p-8 shadow-md max-w-sm w-full">
            <h2 class="text-2xl font-semibold mb-4">Admin Login</h2>
            <p v-if="invalidCredentials" class="text-red-500 mb-4 animate-pulse">Vale kasutaja nimi või parool!</p>
            <form @submit.prevent="login" class="space-y-4">
                <div>
                    <label for="username" class="block mb-1">Kasutaja nimi:</label>
                    <input type="text" id="username" name="username" v-model="username"
                        class="w-full px-4 py-2 border focus:outline-none focus:border-gray-500">
                </div>
                <div>
                    <label for="password" class="block mb-1">Parool:</label>
                    <input type="password" id="password" name="password" v-model="password"
                        class="w-full px-4 py-2 border focus:outline-none focus:border-gray-500">
                </div>
                <div>
                    <button type="submit"
                        class="w-full bg-black text-white font-semibold py-2 px-4 hover:bg-gray-800">Login</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            username: '',
            password: '',
            invalidCredentials: false
        };
    },
    methods: {
        login() {
            fetch(`https://hommukaxsylvester.ikt.khk.ee/api/session.php`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    username: this.username,
                    password: this.password
                })
            })
                .then(response => {
                    if (response.ok) {
                        this.$router.push('/admin/dashboard');
                    } else if (response.status === 401) {
                        this.invalidCredentials = true;
                    } else {
                        console.error('Error logging in:', response.status);
                    }
                })
                .catch(error => {
                    console.error('%c❌ Error logging in:', 'color: red; font-weight: bold;');
                    console.error('%c❌ Error:', 'color: blue;', error);
                    console.timeEnd('login');
                });
        }
    }
};
</script>