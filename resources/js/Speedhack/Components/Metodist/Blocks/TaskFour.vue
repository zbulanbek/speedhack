<template>
	<section>
		<template v-if="$page.props.user.role_id === '4' || active == true">
			<section class="test-wrap">
			<div class="wrap-h">
				<div class="text-test">{{ block.title }}</div>
				<template v-if="$page.props.user.role_id === '4'">
					<template v-if="block.is_show == 0">
						<button class="btn-show" :class="{'active': active}" @click="toggleText">
							<img src="/images/icons/eye-grey.svg" class="grey">
							<img src="/images/icons/eye-blue.svg" class="blue">
						</button>
					</template>
				</template>
			</div>
			<section class="test">
				<drag :block="block"></drag>
			</section>
			</section>
		</template>
	</section>
</template>
<script>
	import Drag from '@/Speedhack/Components/Metodist/Test/FourDrag';
	export default {
		props:{
			block: Object,
		},
		 data() {
	        return {
	        	active: false,
	        }
	    },
		components: {
			Drag,
		},
		mounted() {
	    	if(this.block.is_show == 1 ){
        		this.active = true;
        	}

        	let vm = this;
        	window.Echo.private('show-topic-block.' + this.block.id)
            .listen('.show.topic.block', function ({item}) {
                vm.active = item.active;
            });
        },
         methods: {
         	toggleText() {
        		this.active = !this.active;

        		let item = {
	                id: this.block.id,
	                active: this.active,
	            }
				window.axios.post('/metodist/show/topic/block', {item})

        	}
         }

	}
</script>
<style scoped>
.account-title{
		font-family: "Inter-Bold", sans-serif;
		padding: 30px 20px;
		font-weight: 600;
		color: #050A1C;
		font-size: 24px;
	}
	.account-title img{
		margin-right: 16px;
	}
	.bg-account{
		background: #F5F7F8;
		width: 100%;
    	height: 100%;
    	display: flex;
	}

	.content-wrap{
		width: 100%;
	}

	.tab-wrap{
		border-bottom: 1px solid #E0E3EB;
		display: flex;
		padding-right: 60px;
		padding-left: 60px;
		margin-bottom: 26px;
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


	.text-test{
		font-family: 'Inter', sans-serif;
		font-weight: 500;
		font-size: 24px;
		color: #003ECB;
		margin-bottom: 20px;
	}


	.buttons-wrap{
		display: flex;
		align-items: flex-end;
		justify-content: flex-end;
    	padding-right: 60px;
    	font-size: 14px;
    	color: #fff;
	}
	.btn-prev img{
		margin-right: 10px;
	}
	.btn-prev{
		background-color: #F2994A;
		border-radius:  12px;
		margin-right: 24px;
		padding: 6px 20px;
		color: #fff;

	}

	.btn-next img{
		margin-left: 10px;
	}
	.btn-next{
		background-color: rgba(208, 208, 208, 0.56);
		border-radius:  12px;
		margin-left: 24px;
		padding: 6px 20px;
		display: flex;
		justify-content: center;
		align-items: center;
		width: 118px;
	}

	@media only screen and (max-width: 768px) {
		.tab-wrap{
			padding-right: 20px;
    		padding-left: 20px;
		}
		.tab-wrap .item:last-child{
			margin: 0px;
		}
		.text-test{
			margin-right: 20px;
			margin-left: 20px;
		}
		.test{

		}
		.buttons-wrap{
			padding-right: 20px;
    		padding-left: 20px;
    		justify-content: center;
    		margin-bottom: 100px;
		}
		.bg-account{
   			flex-direction: column;
   		}
	}

	.wrap-h{
		display: flex;
		justify-content: space-between;
		align-items: center;
	}
	.test-wrap{
		padding-left: 24px;
		padding-right: 24px;
	}
	.btn-show{
		background-color: transparent;
	}
	.btn-show .blue{
		display: none;
	}
	.btn-show.active .grey{
		display: none;
	}
	.btn-show.active .blue{
		display: block;
	}
</style>
