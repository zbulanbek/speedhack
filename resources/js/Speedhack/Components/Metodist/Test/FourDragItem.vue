<template>
	<div class="drag-item">
		<span>{{ first_word }}</span>
		<div class="input-wrap">
			<draggable
		        class="dragArea list-group"
		        :list="options"
		       	group="people"
		       	@change="log"
		       	v-if="currect == null"
	    	>
	    	</draggable>
	  		<div class="currect_word"> {{currect}} </div>
		</div>
		<span> {{ last_word }} </span>
	</div>
</template>
<script>
	import draggable from 'vuedraggable'
	export default {
		props: {
			id: Number,
	      	item: Object,
	      	block_id: Number,
	    },
	    components: {
	    	draggable,
	    },
	    data() {
	        return {
	        	options: [],
	        	currect: null,
	        	first_word: '',
	        	last_word: '',
	        	currect_answer: null,
	        }
	    },
	    mounted() {
		  	this.options[0] = this.item;
		  	this.answers = this.answers_all;
		  	//oбрез текста
			const text = this.options[0].question;
		  	var first_symbol = text.indexOf('#??#', 0);
		 	this.first_word = text.slice(0, first_symbol);
		 	first_symbol = first_symbol + 4;
		 	this.last_word = text.slice(first_symbol);
		 	//oбрез текста


		 	let vm = this;
        	window.Echo.private('four-drag.' + this.id)
            .listen('.four.drag', function ({item}) {
            	   	vm.currect = item.currect;
            	   	vm.options = item.options;
            });
		},
		methods: {

			async  log(evt) {
				const { data } = await window.axios.post('/test/question/four/check', { id: this.id, question: evt.added.element.name });
				if(data['currect']){
		      		this.currect = evt.added.element.name;

					let item = {
		                id: this.id,
		                currect: this.currect,
		                options: this.options,
		            }
					window.axios.post('/test/question/four/drag', {item});
					this.$emit('on-true', evt);
		      	}else{
		      		var index = this.options.findIndex(item => item.name === evt.added.element.name);
		      		this.options.splice(index, 1);

					let item = {
		                id: this.id,
		                currect: this.currect,
		                options: this.options,
		            }
					window.axios.post('/test/question/four/drag', {item});
					this.$emit('on-false', evt);
		      	}
			},

		},
	}
</script>
<style scoped>
	.input-wrap{
		background-color: transparent;
		min-width: 100px;
		max-height: 28px;
		padding-left: 6px;
		border-bottom: 1px solid rgba(196, 196, 196, 0.61);
		margin-left: 4px;
		margin-right: 4px;
	}
	.drag-item{
		display: flex;
		color: #050A1C;
		font-family: 'Inter', sans-serif;
		line-height: 24px;
		font-size: 16px;
    }
	.currect_word{
		font-family: 'Inter', sans-serif;
		color: #3BA972;
	}
</style>
