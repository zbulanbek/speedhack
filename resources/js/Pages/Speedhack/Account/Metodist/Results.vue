<template>
	<account-layout>
		<section class="bg-account">
    		<div class="title-page"><span>Мои результаты</span></div>

    		<!-- <div class="header-result-wrap">
    			<div class="wrap">
    				<p class="number">25</p>
    				<span>Оплатили</span>
    			</div>

    			<div class="wrap">
    				<p class="number">8</p>
    				<span>Не оплатил</span>
    			</div>

    			<div class="wrap">
    				<p class="number">33</p>
    				<span>Всего</span>
    			</div>

    			<div class="income">
    				<span class="title">Общий доход</span>
    				<span class="maney">+ 37590 ₸</span>
    				<span class="bottom">Последнее обновление: 12.09.2020</span>
    			</div>
    		</div> -->


    		<section class="table-wrap">
			<div class="table-main-wrap">
    			<table class="table-main">
		            <tr>
		                <th>ID</th>
		                <th>ФИО ученика </th>
		                <th>Дата и время урока</th>
		                <th>Скачать комментарий</th>
		                <th>Действия</th>
		            </tr>
					<!-- 
		            <template v-for="item in lessons">
		            	<template v-if="item.application.methodist_status_id !== null">
		            		<tr>
							    <td>{{ item.student_id }}</td>
							    <td> {{ item.student ? item.student.name : '' }}  {{ item.student ? item.student.surname : '' }} </td>
							    <td> {{ item.application.start_time | dateFormatForHuman }} {{ item.application.start_time | timeFormat }}</td>
							    <td class="wrap">
							    	<a v-if="item.application.methodist_status_id !== null" :href="'/storage' + item.application.comment" download class="btn btn-primary"> Скачать документ</a>
							    </td>
							    <td>
							    	<span class="green red">Не оплатил</span>
							    </td>
							</tr>
		            	</template>
		            </template> -->

		            <template v-for="item in orders">
		            	<tr>
						    <td>{{ item.user_id }}</td>
						    <td> {{ item.user ? item.user.name : '' }}  {{ item.user ? item.user.surname : '' }} </td>
						    <td> {{ item.updated_at | dateFormatForHuman }} {{ item.updated_at | timeFormat }}</td>
						    <td class="wrap">
						    	<a href="" download class="btn btn-primary"> Скачать документ</a>
						    </td>
						    <td>
						    	<template v-if="item.paid">
						    		<span class="green">Оплатил(-a)</span>
						    	</template>
						    	<template v-else>
						    		<span class="green red">Не оплатил</span>
						    	</template>
						    	
						    </td>
						</tr>
		            </template>
		        </table>
	        </div>
	    	</section>

    	</section>
	</account-layout>
</template>
<script>
	export default {
	    props:{
	        user: Object,
	        lessons: Array,
	        orders: Array
	    },
	    data: function () {
	        return {

	        }
	    },
	    methods : {
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

	.header-result-wrap{
		padding: 20px 35px;
		background-color: #fff;
		border-radius: 8px;
		box-shadow: 0px 4px 16px rgba(110, 120, 130, 0.12);
		margin-bottom: 16px;
		display: flex;
		justify-content: space-between;
		align-items: center;
		margin-left: 60px;
    	margin-right: 60px;
	}

	.header-result-wrap .wrap{
		display: flex;
		flex-direction: column;
		align-items: center;
		justify-content: center;
	}

	.header-result-wrap .wrap .number{
		font-weight: bold;
		font-size: 50px;
		font-family: Inter;
		margin-bottom: 8px;
		color: #3BA972;
	}

	.header-result-wrap .wrap:nth-child(2) .number{
		color: #E36018;
	}

	.header-result-wrap .wrap:nth-child(3) .number{
		color: #003ECB;
	}

	.header-result-wrap .income{
		display: flex;
		flex-direction: column;
		justify-content: flex-end;
	}

	.header-result-wrap .income .title{
		font-size: 20px;
		color: #000000;
		text-align: right;
		font-family: Inter;
		margin-bottom: 8px;
	}

	.header-result-wrap .income .maney{
		color: #F2994A;
		font-weight: 500;
		font-size: 40px;
		text-align: right;
	}

	.header-result-wrap .income .bottom{
		color: rgba(5, 10, 28, 0.5);
		font-size: 16px;
		text-align: right;
		font-family: Inter;
	}

	/*table*/
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
		font-size: 16px;
		color: #979797;
	}

	.table-main td {
	   	border-collapse: collapse;
	  	text-align: left;
	  	padding: 26px 0px 26px 40px;
		font-family: "Inter", sans-serif;
		font-size: 16px;
	    color: #050A1C;
	}

	.table-main tr:nth-child(even) {
	  background-color: #F9F9FA;
	}

	.blue{
		color: #003ECB;
		font-size: 18px;
		font-family: Inter;
		white-space: nowrap;
	    overflow: hidden;
	    width: 180px;
	    display: block;
	    text-overflow: ellipsis;
	}

	.green{
		color: #3BA972;
		font-weight: bold;
	}

	.red{
		color: #E36018;
		font-weight: bold;
	}

	.btn-primary{
		background-color: #003ECB;
		border-color: #003ECB;
	}

	@media only screen and (max-width: 768px) {
		.title-page{
			padding: 30px 20px;
		}
		.table-wrap {
		    margin-bottom: 100px;
		    padding-left: 20px;
		    padding-right: 20px;
		}
		.table-main-wrap {
		    overflow-x: auto;
		    padding-bottom: 40px;
		}
	}
</style>
