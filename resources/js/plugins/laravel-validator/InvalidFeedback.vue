<template>
    <div v-if="$errors.has(input)" class="invalid-feedback">
        {{ $errors.first(input) }}
    </div>
</template>
<script>
    export default {
        props: ['input'],
    }
</script>
