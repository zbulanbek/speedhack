<template>
	<div class="container">
        <div class="wrap-center">
             <span class="title-center">{{ $page.props.sets['main.tab.title'] }}</span> 
        </div>
        <div class="tab-course">
		  	<b-tabs
		  		active-nav-item-class="active-tab-nav-item">
		  		<template v-for="tab in tabs">
			    	<b-tab>
			      		<template #title>
			        		<img :src="tab.title_image"> {{ tab.title }}
			      		</template>
			      		<item-tab-course
			      			:img="tab.image"
			      			:title="tab.title"
			      			:text="tab.body"
			      		></item-tab-course>
			      	</b-tab>
		      	</template>
			</b-tabs>
		</div>
    </div>
</template>
<script>
	import ItemTabCourse from '@/Speedhack/Components/Details/ItemTabCourse';

	export default {
	    props: {
	        tabs: Array,
	    },
	    components: {
	        ItemTabCourse,
	    },
	    data() {
	        return {

	        }
	    },
	    methods: {

	    },
	    mounted() {

	    },
	}
</script>
<style scoped>
	.title-center{
		text-align: center;
		font-family: 'Inter', sans-serif;
		font-weight: bold;
		font-size: 50px;
		line-height: 78px;
		color: #050A1C;
	}
	.wrap-center{
		display: flex;
		justify-content: center;
		margin-top: 80px;
	}



</style>
