<template>
	<div class="comment-item">
		<div class="users-wrap">
			<div class="avatar">
				<img :src="comment.image">
			</div>
			<div class="wrap">
				<span class="name">{{ comment.name }}</span>
				<stars :count="comment.rate"></stars>
			</div>
		</div>
		<div class="text-wrap">
			<div class="text" v-if="summary">
		  		{{ comment.text | limitTo}}
		  	</div>
		  	<div  class="text" v-else>
			  	{{ comment.text }}
			</div>
			<a class="read-more" v-if="comment.text.length > 300 && summary" @click="summary = false">Читать далее</a>
			<p class="date">
				{{ comment.created_at | toDate }}
			</p>
		</div>
	</div>
</template>
<script>
	import Stars from '@/Speedhack/Components/Details/Stars';
	export default {
		props: {
			comment: Object
   		},
	   	components: {
	      	Stars,
	    },
	    data() {
	        return {
	           summary: true,
	        }
    	},
    	filters: {
	        limitTo: function (value) {
	            if (!value) return '';
	            return value.substring(0, 200 )+ '...';
	        },
	        toDate: function (date) {
	            return new Date(date).toLocaleDateString();
            }
	    }
	}
</script>
<style scoped>
	.comment-item{
		background: #FFFFFF;
		box-shadow: 0px 4px 16px rgba(110, 120, 130, 0.12);
		border-radius: 8px;
		margin-bottom: 20px;
		padding: 20px 60px;
		display: flex;
	}
	.users-wrap{
		display: flex;
	}
	.avatar{
		width: 70px;
		height: 70px;
		border-radius: 50%;
		overflow: hidden;
		margin-right: 20px;
	}
	.avatar img{
		width: 100%;
		height: 100%;
		object-fit: cover;
	}

	.users-wrap .wrap .name{
		font-family: 'Inter', sans-serif;
		font-style: normal;
		font-weight: 500;
		font-size: 18px;
		color: #050A1C;
		margin-bottom: 10px;
	}
	.text-wrap{
		margin-left: 60px;
		font-family: 'Inter', sans-serif;
		font-style: normal;
		font-weight: 500;
		font-size: 16px;
		color: #2C2D32;
	}
	.read-more{
		color: #003ECB;
		display: block;
	}
	.date{
		padding: 0px;
		margin: 0px;
		display: inline-block;
		margin-top: 16px;
	}

	@media only screen and (max-width: 768px) {
		.comment-item{
			flex-direction: column;
			padding: 40px 20px;
		}

		.text-wrap{
			margin: 0px;
    		margin-top: 20px;
		}
	}
</style>







