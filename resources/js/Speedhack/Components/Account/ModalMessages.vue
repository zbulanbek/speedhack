<template>
	<div class="modal-message">
		<img src="/images/icons/message-arr.png" class="message-arr">
		<div class="arrow-hr"></div>
		<ul class="messages-lists">
			<template v-for="item in messages">
				<li class="item">
					<div class="avatar" :style="'background-color:' + item.color">
						<img :src="item.img" v-if="item.img">
						<div class="letter" v-else> {{ item.name | letter }} </div>
					</div>
					<div class="text">
						<b>{{ item.name }}</b>
						{{ item.message }} 
					</div>
				</li>
			</template>
		</ul>
	</div>
</template>
<script>
	export default {
		data() {
	        return {
	        	messages: [
	        		{
	        			img: "/images/users/woman.jpg",
	        			name: "Aidana",
	        			color: "#A259FF",
	        			message: "проверил Ваше домашнее задание"
	        		},
	        		{
	        			img: null,
	        			name: "Aidana",
	        			color: "#5551FF",
	        			message: "проверил Ваше домашнее задание"
	        		},
	        		{
	        			img: null,
	        			name: "Zhansaya",
	        			color: "#E97B3B",
	        			message: "проверил Ваше домашнее задание"
	        		},

	        	],
	        }
	    },
	    filters: {
		  	letter: function (value) {
			    if (!value) return ''
			    value = value.toString();
		    	return value.charAt(0).toUpperCase();
		  }
		}
	}
</script>
<style scoped>
	.modal-message{
		background: #FFFFFF;
		box-shadow: 0px 4px 16px rgba(110, 120, 130, 0.12);
		border-radius: 8px;
		width: 300px;
		position: relative;
	}
	.message-arr{
		position: absolute;
		top: -26px;
    	right: 12px;
		z-index: 1;
	}
	.arrow-hr{
		position: absolute;
	    top: 0px;
	    right: 29px;
	    z-index: 1;
	    height: 12px;
	    background-color: #fff;
	    width: 33px;
	}
	.messages-lists{
		margin-bottom: 0px;
		overflow-y: auto;
		max-height: 320px;
	}
	.text{
		font-family: "Inter", sans-serif;	
		font-size: 12px;
		line-height: 15px;
		color: #7B838B;
		text-align: left;
	}

	.text b{
		font-family: "Inter-Bold", sans-serif;
		color: #050A1C;
	}
	.avatar{
		width: 34px;
		height: 34px;
		min-width: 34px;
		min-height: 34px;
		border-radius: 50%;
		overflow: hidden;
		margin-right: 10px;
		display: flex;
		align-items: center;
		justify-content: center;
	}
	.avatar img{
		width: 100%;
		height: 100%;
		object-fit: cover;
	}
	.avatar .letter{
		font-family: "Inter-Bold", sans-serif;	
		font-size: 20px;
		color: #fff;
	}
	.messages-lists .item{
		display: flex;
		padding: 14px 16px;
		border-bottom: 1px solid #F2F2F2;
	}
	.messages-lists .item:last-child{
		border-bottom: none;
	}
</style>