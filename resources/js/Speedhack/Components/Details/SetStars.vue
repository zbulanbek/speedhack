<template>
	<ul class="stars">
        <template v-for="n in 5">
            <li v-if="count >= n"
            	@click="change(n)"
            	class="star"
            	>
                <img src="/images/icons/star-full.svg">
            </li>
            <li v-else
            	@click="change(n)"
            	class="star">
                <img src="/images/icons/star-empty.svg">
            </li>
        </template>
    </ul>
</template>
<script>
export default {
    data() {
        return {
            count: 0
        }
    },

    methods: {
        change(index){
            this.$emit('starToForm', index);
            this.count = index;
        }
    },
}
</script>
<style scoped>
	.stars{
		display: flex;
		align-items: center;
		margin: 0px;
	}
	.star{
		margin-right: 10px;
	}
	.star:last-child{
		margin-right: 0px;
	}
</style>
