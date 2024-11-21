<template>
    <div>
        <input v-model="userInput" placeholder="Enter input" />
        <button @click="checkLink">Check Link</button>
        <p v-if="result !== null">Link exists: {{ result }}</p>
    </div>
</template>

<script>
export default {
    data() {
        return {
            name: 'CheckLink',
            userInput: '',
            result: null
        };
    },
    methods: {
        async checkLink() {
            try {
                const response = await fetch(`/check-link/${this.userInput}`);
                const data = await response.json();
                this.result = data.exists;
            } catch (error) {
                console.error('Error:', error);
            }
        }
    }
};
</script>