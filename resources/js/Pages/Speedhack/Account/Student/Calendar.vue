<template>
    <account-layout>
    	<section class="bg-account">
    		<div class="title-page"><span>Мое расписание</span></div>
    		<div class="row wrap-calendar">
    			<div class="col-12 col-md-6 col-lg-6 col-xl-6">
    				<div class="date-picker-wrap">
		    			<section class="date-wrap">
			    			<date-picker
			    				class="custom-calendar max-w-full"
			    				:attributes="attrs"
			    				mode="date"
			    				v-model="date"
			    				is-expanded>
			    				</date-picker>
			    		</section>
		    		</div>
    			</div>
    			<div class="col-12 col-md-6 col-lg-6 col-xl-6">
		    		<div class="calendar-info-wrap">
		    			<template v-for="item in events_curse">
		    			<template  v-if="item.customData.title !== 'Today' ">
	    					<calendar-item :item="item"></calendar-item>
	    				</template>
	    			</template>
		    		</div>
	    		</div>
    		</div>

    		<!-- <ul style="background-color: red;">
    			<template v-for="item in events_curse">
					<li>{{item.customData.title}}</li>
				</template>
    		</ul> -->
    	</section>
	</account-layout>
</template>

<script>
	import moment from 'moment';
	import DatePicker from 'v-calendar/lib/components/date-picker.umd'
	import CalendarItem from "@/Speedhack/Components/Account/CalendarItemStudent";

	export default {
		props:{
			timetables: Array
		},
	    components: {
	    	DatePicker,
	    	CalendarItem
	    },
	    data() {
	        return {
	        	date: "",
	        	events_curse: null,
	        	attrs: [
	        		{
			          	key: 'today',
			          	highlight: 'green',
			        	dates: new Date(),
			        	customData: {
				            title: 'Today',
				        },
			        },

				],
	    	}
	    },
      	created() {
      		Array.prototype.push.apply(this.attrs, this.timetables);

    	},
    	watch: {
	     	date: {
	     		handler: function (value) {
	     			var valObj = this.attrs.filter(function(elem){
		    			if(moment(elem.dates).locale("ru").format('LL') == moment(value).locale("ru").format('LL'))
					    	return elem;
					});

					if(valObj.length > 0){
						this.events_curse = valObj;
					}else{
						this.events_curse = null;
					}
		    	},
		        deep: true
	     	}
	   	},

	}
</script>

<style scoped>
	.bg-account{
        margin-bottom: 290px;
		background: #F5F7F8;
		width: 100%;
    	height: 100%;
	}

	.title-page{
		padding: 30px 60px;
		border-bottom: 1px solid #E0E3EB;
		margin-bottom: 30px;
	}
	.title-page span{
		font-size: 24px;
		font-family: "Inter-Bold", sans-serif;
		color: #050A1C;
	}

	.date-wrap{
		width: 100%;
	}
	.date-picker-wrap{
		display: flex;

	}
	.wrap-calendar{
		padding: 0px 45px;
	}
	.mine{
		position: absolute;
	}
	.wrap-calendar{
		display: flex;
	}

	.calendar-info{
		background: #FFFFFF;
		box-shadow: 0px 4px 16px rgba(110, 120, 130, 0.12);
		border-radius: 8px;
		/*overflow: hidden;*/
	}

	.calendar-info .header-wrap{
		display: flex;
		flex-direction: column;
		align-items: center;
		justify-content: center;
		padding: 16px 10px 28px 10px;
		background: #F8CC45;
		border-top-left-radius: 8px;
		border-top-right-radius: 8px;
		position: relative;
	}

	.calendar-info .header-wrap:before{
		content: '';
		display: block;
	  	width: 0;
	  	height: 0;
	  	position: absolute;
	  	top: 50%;
	  	transform: translateY(-50%);
	  	left: -15px;
	  	border-top: 20px solid transparent;
	  	border-bottom: 20px solid transparent;
	  	border-right: 20px solid #F8CC45;
	}

	.calendar-info .header-wrap .date{
		font-size: 16px;
		color: #E97B3B;
		margin-bottom: 12px;
		font-family: "Inter", sans-serif;
	}
	.calendar-info .header-wrap .title{
		color: #FFFFFF;
		font-size: 34px;

		font-family: "Inter-Bold", sans-serif;
	}
	.body-wrap{
		padding: 30px;
	}
	.body-wrap .item{
		display: flex;
		flex-direction: column;
		margin-bottom: 30px;
	}
	.body-wrap .item:last-child{
		margin-bottom: 0px;
	}
	.body-wrap .item b{
		font-size: 18px;
		color: #050A1C;
		font-family: "Inter-Bold", sans-serif;
		margin-bottom: 4px;
	}
	.body-wrap .item span{
		color: #7B838B;
		font-size: 18px;
		font-family: "Inter", sans-serif;
	}

	.vc-arrow{
		background: rgba(208, 208, 208, 0.56);
		border-radius: 12px;
	}
	.date-picker-wrap{
		max-width: 700px;
	}
	.calendar-info-wrap{
		max-width: 698px;
	}

	.btn-main{
		font-size: 16px;
	    margin-top: 33px;
	    display: block;
	    line-height: 15px;
	    padding: 15px 40px;
	}
	@media only screen and (max-width: 1024px) {
		.wrap-calendar{
			padding: 0px 5px;
			margin-bottom: 40px;
		}
		.wrap-calendar{
			padding: 0px 20px;
		}
	}
	@media only screen and (max-width: 767.98px) {
		.title-page{
			padding: 20px;
		}
		.wrap-calendar{
			padding: 0px 20px;
		}
		.calendar-info-wrap{
			margin-top: 40px;
			margin-bottom: 40px;
		}

		.calendar-info .header-wrap:before{
			top: -28px;
		    transform: translateX(-50%) rotate(90deg);
		    left: 50%;
		}
		.wrap-calendar{
			margin-bottom: 40px;
		}
	}
</style>
