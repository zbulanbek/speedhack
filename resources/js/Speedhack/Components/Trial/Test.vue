<template>
	<div class="wrap">
		<button @click="selectTecher('intermediate')">Intermediate</button>
		<button @click="selectTecher('pre_intermediate')">Pre intermediate</button>

		<all-test v-if="showTest" :tasks="tasks" :questions="questions" :lesson="lesson"></all-test>
	</div>
</template>
<script>
	import AllTest from '@/Speedhack/Components/Trial/Index';

	export default {
	    components: {
	        AllTest
	    },
	    data() {
	        return {
	        	showTest: false,
	        	tasks: null,
	        	questions: null,
				lesson: null,
	        }
	    },
	    methods: {
	        async selectTecher(index) {
	            const { data } = await window.axios.post('/trial/get/tests', { level: index });
	            if(data['status'] == 'success'){
	            	this.tasks = data['tasks'];
	            	this.questions = data['questions'];
	            	this.lesson = data['lesson'];
	            	this.showTest = true;
	            }
	        },
	    },
	}
</script>
