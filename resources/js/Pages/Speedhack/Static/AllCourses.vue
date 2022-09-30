<template>
	<welcome-layout>
		<header-white></header-white>
		<bread :breads="breads"></bread>

		<div class="container">
	        <div class="wrap-center">
	            <span class="title-center">Наши курсы</span>
	        </div>
        	<div class="tab-course">
		  		<b-tabs
		  			active-nav-item-class="active-tab-nav-item">
		  			<template v-for="category in categories">
				    	<b-tab>
				      		<template #title>
				        		<span class="circle"></span> {{ category.title }}
				      		</template>
				      		<div class="row top-40">
				      			<template v-for="item in category.courses">
				      				<div class="col-12  col-md-6 col-lg-4">
				      					<item-course-block :course="item"></item-course-block>
									</div>
				      			</template>
				        	</div>
		    			</b-tab>
	    			</template>
 				</b-tabs>
		  	</div>
    	</div>
    	<form-request></form-request>
	</welcome-layout>
</template>
<script>
	import HeaderWhite from '@/Speedhack/Components/Details/HeaderWhite';
	import ItemCourseBlock from '@/Speedhack/Components/Details/ItemCourseBlock';
	import FormRequest from '@/Speedhack/Components/Details/FormRequest';
	import Bread from '@/Speedhack/Components/Details/Bread';

	export default {
	    props: {
            categories: Array,
	    },
	    components: {
	        HeaderWhite,
	        ItemCourseBlock,
	        FormRequest,
	        Bread
	    },
	    data() {
	        return {
           		breads: [
	           		{
	           			title: "Главная",
	           			link: "/",
	           		},
           		],
	        }
	    },
	    methods: {

		}
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
	.circle{
		display: block;
		width: 8px;
		height: 8px;
		background-color: #A339FF;
		border-radius: 50%;
		overflow: hidden;
		margin-right: 8px;
	}
	.top-40{
		margin-top: 40px;
	}

	.tab-course .nav-tabs .nav-link{
		display: flex;
		justify-content: center;
		align-items: center;
	}

</style>
