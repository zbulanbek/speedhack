<template>
    <account-layout>
    	<section class="bg-account">
    		<div class="title-page"><span>Мои материалы</span></div>
    		<section class="tab-wrap">
    			<div class="item" :class="{'active': toggle_class == true }" @click="toggle_class = true">Grammar</div>
    			<div class="item" :class="{'active': toggle_class !== true }" @click="toggle_class = false">Vocabulary</div>
    		</section>
<!--    		<template v-if="toggle_class == true">-->
<!--	    		<materials :materials="materials" :materials_count="materials_count"></materials>-->
<!--    		</template>-->
<!--    		<template v-if="toggle_class == false">-->
<!--    			<vocabulary></vocabulary>-->
<!--    		</template>-->
		</section>
	</account-layout>
</template>
<script>
	import Vocabulary from '@/Speedhack/Components/Account/Vocabulary';
	import Materials from '@/Speedhack/Components/Account/Materials';

	export default {
		props:{
			materials: Array,
			materials_count: Number
		},
	    components: {
	    	Vocabulary,
	    	Materials
	    },
	    data() {
	        return {
	        	toggle_class: true,
	        }
	    }
	}
</script>
<style scoped>
	.bg-account{
		background: #F5F7F8;
		width: 100%;
    	height: 100%;
    }
	.title-page{
		padding: 30px 60px;
	}
	.title-page span{
		font-size: 24px;
		font-family: "Inter-Bold", sans-serif;
		color: #050A1C;
	}
	.tab-wrap{
		border-bottom: 1px solid #E0E3EB;
		display: flex;
		padding-right: 60px;
		padding-left: 60px;
		margin-bottom: 46px;
	}
	.tab-wrap .item{
		padding: 8px 0px;
		font-size: 18px;
		font-family: "Inter", sans-serif;
		color: rgb(123, 131, 139);
		margin-right: 40px;
		margin-bottom: -1px;
	}
	.tab-wrap .item.active{
		color: #003ECB;
		border-bottom: 1px solid #003ECB;
	}

	.table-wrap{
		padding-left: 60px;
		padding-right: 60px;
		display: flex;
		flex-direction: column;
	}

	.table-main{
		font-family: "Inter", sans-serif;
	  	border-collapse: collapse;
	  	width: 100%;
	  	background: #FFFFFF;
	  	box-shadow: 0px 4px 16px rgba(110, 120, 130, 0.12);
	  	border-radius: 8px;
	  	margin-bottom: 20px;
	}

	.table-main th {
		text-align: left;
		padding: 26px 0px 26px 40px;
		font-family: "Inter", sans-serif;
		font-size: 18px;
		color: #979797;
	}

	.table-main td {
	   	border-collapse: collapse;
	  	text-align: left;
	  	padding: 26px 0px 26px 40px;
		font-family: "Inter", sans-serif;
		font-size: 18px;
	    color: #050A1C;
	}

	.table-main tr:nth-child(even) {
	  background-color: #F9F9FA;
	}

	.btns-wrap{
		display: flex;
		align-items: center;
	}
	.btn-table img{
		width: 24px;
		height: 24px;
	}
	.btn-table:first-child{
		margin-right: 10px;
	}

	.btn-table:last-child{
		margin-left: 10px;
	}
	.btn-next{
		font-family: "Inter", sans-serif;
		font-size: 16px;
		line-height: 19px;
		text-align: right;
		text-decoration-line: underline;
		color: rgba(44, 44, 42, 0.8);
	}
	@media only screen and (max-width: 768px) {
		.table-main th{
			padding: 20px 0px 20px 20px;
		}
		.table-main td{
			padding: 20px;
		}
		.title-page{
			padding: 30px 20px;
		}
		.tab-wrap{
			padding-right: 20px;
    		padding-left: 20px;

		}
		.table-wrap{
			padding-right: 20px;
			padding-left: 20px;
			margin-bottom: 60px;
		}
		.table-main-wrap{
			overflow-x: auto;
			padding-bottom: 20px;
		}
	}
</style>
