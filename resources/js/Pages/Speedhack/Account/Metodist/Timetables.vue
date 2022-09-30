<template>
	<account-layout>
		<section class="bg-account">
			<div class="wrap">
				<div class="title-page">
					<span>Мои pасписания</span>
					<change-mode></change-mode>
				</div>

				<div>
					<vue-cal
				        :time-from="9 * 60"
				        :time-to="20 * 60"
				        :disable-views="['month','years', 'year', 'day']"
				       	:events="mine_events"
				       	locale="ru"
				    >
				</vue-cal>
				</div>
			</div>
    	</section>
	</account-layout>
</template>
<script>
	import VueCal from 'vue-cal';
	import 'vue-cal/dist/vuecal.css';
	import 'vue-cal/dist/i18n/ru.js'
	import ChangeMode from '@/Speedhack/Components/Metodist/ChangeMode';


	export default {
		components: {
			VueCal,
			ChangeMode,
		},
		props: {
	    	mode: Object,
	    	notices: Array
	    },
	   	data() {
	        return {
	        	events: [
				    {
				      start: '2018-11-20 09:20',
				      end: '2018-11-20 13:00',
				      title: 'Monday',
				      icon: 'shopping_cart', // Custom attribute.
				      content: 'Click to see my shopping list',
				      contentFull: 'My shopping list is rather long:<br><ul><li>Avocados</li><li>Tomatoes</li><li>Potatoes</li><li>Mangoes</li></ul>', // Custom attribute.
				      class: 'leisure'
				    },
				],
			  	mine_events: [],
	        }
	    },
	    mounted(){
	    	var currentDate = moment();
			var weekStart = currentDate.clone().startOf('isoWeek');
			var weekEnd = currentDate.clone().endOf('isoWeek');
			var days = [];

			for (var i = 0; i <= 6; i++) {
			    days.push(moment(weekStart).add(i, 'days').format("YYYY-MM-DD"));
			}

			let event;
			let times = JSON.parse(this.mode.monday);

			//monday
			if(times !== null && times.length > 0){
				for (let key in times) {
					event = {
						start: days[0] + " " + times[key].start,
						end: days[0] + " " + times[key].end,
						class: 'monday-mode'
					}
					this.mine_events.push(event);
				}
			}
			//Tuesday
			times = JSON.parse(this.mode.tuesday);
			if(times !== null && times.length > 0){
				for (let key in times) {
					event = {
						start: days[1] + " " + times[key].start,
						end: days[1] + " " + times[key].end,
						class: 'tuesday-mode'
					}
					this.mine_events.push(event);
				}
			}

			//wednesday
			times = JSON.parse(this.mode.wednesday);
			if(times !== null && times.length > 0){
				for (let key in times) {
					event = {
						start: days[2] + " " + times[key].start,
						end: days[2] + " " + times[key].end,
						class: 'wednesday-mode'
					}
					this.mine_events.push(event);
				}
			}
			//thursday
			times = JSON.parse(this.mode.thursday);
			if(times !== null && times.length > 0){
				for (let key in times) {
					event = {
						start: days[3] + " " + times[key].start,
						end: days[3] + " " + times[key].end,
						class: 'thursday-mode'
					}
					this.mine_events.push(event);
				}
			}
			//friday
			times = JSON.parse(this.mode.friday);
			if(times !== null && times.length > 0){
				for (let key in times) {
					event = {
						start: days[4] + " " + times[key].start,
						end: days[4] + " " + times[key].end,
						class: 'friday-mode'
					}
					this.mine_events.push(event);
				}
			}

			//Saturday
			times = JSON.parse(this.mode.saturday);
			if(times !== null && times.length > 0){
				for (let key in times) {
					event = {
						start: days[5] + " " + times[key].start,
						end: days[5] + " " + times[key].end,
						class: 'saturday-mode'
					}
					this.mine_events.push(event);
				}
			}

			//Sunday
			times = JSON.parse(this.mode.sunday);
			if(times !== null && times.length > 0){
				for (let key in times) {
					event = {
						start: days[6] + " " + times[key].start,
						end: days[6] + " " + times[key].end,
						class: 'sunday-mode'
					}
					this.mine_events.push(event);
				}
			}

		},
	    methods: {

	    },
	}
</script>
<style scoped>
	.bg-account{
		background: #F5F7F8;
		width: 100%;
    	height: 100%;
    	padding: 30px 0px;
    }
    .wrap{
    	padding: 20px 35px;
	    background-color: #fff;
	    border-radius: 8px;
	    box-shadow: 0px 4px 16px rgb(110 120 130 / 12%);
	    margin: 0px 60px;
    }
   	.title-page{
   		display: flex;
   		justify-content: space-between;
   		margin-bottom: 32px;
   	}
	.title-page span{
		font-size: 24px;
		font-family: "Inter-Bold", sans-serif;
		color: #050A1C;
	}

	.title-page .btn-main{
		padding: 9px 30px;
    	font-size: 16px;
	}
</style>
