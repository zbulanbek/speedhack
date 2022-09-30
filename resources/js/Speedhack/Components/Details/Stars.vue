<template>
	<ul class="stars">
		<template v-for="n in 5">
			<li v-if="count >= n">
				<img src="/images/icons/star-full.svg">
			</li>
			<li v-else>
				<img src="/images/icons/star-empty.svg">
			</li>
		</template>
	</ul>
</template>
<script>
	export default {
	   	props: {
	      	count: Number
	    },
	}
</script>
<style scoped>
	.stars{
		display: flex;
		align-items: center;
		margin: 0px;
	}
</style>