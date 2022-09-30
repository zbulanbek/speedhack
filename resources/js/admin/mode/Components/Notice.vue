<template>
	<div class="wrap-item">	
		<button class="btn btn-primary" @click="update">
			Уведомления 
			<template v-if="length > 0">
				<b>{{ length }}</b>
			</template> 
		</button>

		<div class="notice-wrap" v-if="show">
			<ul>
				<template v-for="item in items">
					<li>
						<p>
							<b>Методист: </b><b>{{ item.from.name }} {{ item.from.surname }}</b><br>
							{{ item.message }}
						</p>
					</li>
				</template>
			</ul>
		</div>
	</div>
</template>
<script>
	export default {
		props: {
			notices: Array
		},
		data() {
	        return {
	        	show: false,
	        	length: 0,
	        	items: [],
	        	id: 1,
	        
	        }
	    },
	    mounted(){
	    	this.length = this.notices.length;
	    	this.items = this.notices;

	    	let vm = this;
        	window.Echo.private('mode-notice.' + this.id)
            .listen('.mode.notice', function ({item}) {
                vm.length = item.count;
                vm.items = item.notifications;
            });
	    },
	    methods: {
	    	async update(e) {
	    		this.show = !this.show;
	    		const { data } = await window.axios.post('/metodist/update/mode');
    			if(data['status'] == 'success'){
					this.length = 0;
				}
	    	},

	    }
	}
</script>
<style scoped>
	.btn{
		padding: 0.25rem 0.5rem;
		font-size: 0.765625rem;
    	line-height: 1.5;
    	position: relative;
	}
	.btn b{
		position: absolute;
	    top: -12px;
	    right: -10px;
	    display: block;
	    padding: 2px 6px;
	    border-radius: 10px;
	    background-color: #F2994A;
	}
	.wrap-item{
		margin-right: 20px;
		position: relative;
	}

	.notice-wrap{
		position: absolute;
	    width: 300px;
	    background: #fff;
	    right: 0px;
	    margin-top: 10px;
	    border-radius: 8px;
    	box-shadow: 0px 4px 16px rgb(110 120 130 / 12%);
	}

	.notice-wrap ul{
		padding: 0px;
		margin-bottom: 0px;
		padding-top: 10px;
	}
	.notice-wrap ul li{
		list-style: none;
		border-bottom: 1px solid rgba(207, 216, 220, 0.35);
		padding: 5px 10px;
	}
	.notice-wrap ul li:last-child{
		border: none;
	}
	.notice-wrap ul li p{
		color: #000;
		font-size: 14px;
	}
</style>