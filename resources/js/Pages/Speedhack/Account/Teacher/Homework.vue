<template>
	<account-layout>
		<section class="bg-account">
    		<div class="title-page"><span>Домашние работы</span></div>
    		<section class="table-wrap">
    			<div class="table-main-wrap">
	    			<table class="table-main">
			            <tr>
			                <th>№</th>
			                <th>Name</th>
			                <th>Lessons</th>
			                <th>Point</th>
			                <th>Homework</th>
			            </tr>
			            <tr>
			                <td>1</td>
			                <td class="wrap">Мирас Аюпов <div class="new">new</div></td>
			                <td>Present Perfect</td>
			                <td><b>7.2/10</b></td>
			                <td>
			                	<a class="btn-main active">Посмотреть </a>
			                </td>
			            </tr>
			             <tr>
			                <td>2</td>
			                <td class="wrap">Мирас Аюпов <div class="new">new</div></td>
			                <td>Present Perfect</td>
			                <td><b>7.2/10</b></td>
			                <td>
			                	<a class="btn-main">Посмотреть </a>
			                </td>
			            </tr>
			        </table>
		        </div>
		        <a class="btn-next"> Загрузить еще </a>
    		</section>
    	</section>
    </account-layout>
</template>
<script>
	export default {
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
		border-bottom: 1px solid #E0E3EB;
		margin-bottom: 30px;
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
	.btn-next{
		font-family: "Inter", sans-serif;
		font-size: 16px;
		line-height: 19px;
		text-align: right;
		text-decoration-line: underline;
		color: rgba(44, 44, 42, 0.8);
	}
	.btn-main{
		padding: 7px 30px;
		font-size: 14px;
		background-color: #fff;
		border:1px solid #F2994A;
		color: #F2994A;
	}
	.btn-main.active{
		background-color: #F2994A;
		border: none;
		color: #fff;
	}
	td  b{
		color: #003ECB;
	}
	.new{
		padding: 1px 8px;
		color: #3BA972;
		border: 1px solid #3BA972;
		border-radius: 5px;
		margin-left: 10px;
	}
	.wrap{
		display: flex;
		align-items: center;
	}
	@media only screen and (max-width: 768px) {
		.title-page{
			padding: 30px 20px;
		}
		.table-main-wrap{
			overflow-x: auto;
			padding-bottom: 40px;
		}
		.table-wrap{
			margin-bottom: 100px;
			padding-left: 20px;
    		padding-right: 20px;
		}
		.table-main th{
			padding: 20px 0px 20px 20px;
		}
		.table-main td{
			padding: 20px 0px 20px 20px;
		}
	}
</style>
