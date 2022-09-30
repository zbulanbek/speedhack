<template>
	<account-layout>
    	<section class="bg-account">
    		<div class="title-page"><span>Мой профиль</span></div>
    		<section class="tab-wrap">
    			<div class="item" :class="{'active': toggle_class == true }" @click="toggle_class = true">Личные данные</div>
    			<div class="item" :class="{'active': toggle_class !== true }" @click="toggle_class = false">Изменить пaроль</div>
    		</section>

    		<section v-if="toggle_class == true">
    			<profile-data></profile-data>
    		</section>
    		<section v-if="toggle_class == false">
    			<profile-update></profile-update>
    		</section>
    	</section>

    	<modal name="successModel"
            :width="450"
            :height="366"
            :adaptive="true">
            <modal-success :text="success_update"></modal-success>
        </modal>

    </account-layout>
</template>
<script>
	import ProfileData from '@/Speedhack/Components/Account/ProfileData';
	import ProfileUpdate from '@/Speedhack/Components/Account/ProfileUpdate';

	export default {
	    components: {
	    	ProfileData,
	    	ProfileUpdate
	    },
	    data() {
	        return {
	        	toggle_class: true,
	        	success_update: "Обновление успешно завершено."
	        }
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
	.tab-wrap .item:hover{
		cursor: pointer;
	}
	.tab-wrap .item.active{
		color: #003ECB;
		border-bottom: 1px solid #003ECB;
	}
	@media only screen and (max-width: 1024px)  and (min-width: 768px){
		.title-page{
			padding: 30px 20px;
		}
		.tab-wrap{
            padding-right: 20px;
            padding-left: 20px;
        }

	}
	@media only screen and (max-width: 767px) {
		.title-page{
			padding: 30px 20px;
		}
		.tab-wrap{
            padding-right: 20px;
            padding-left: 20px;
        }

       	.tab-wrap .item:last-child{
       		margin: 0px;
       	}
	}
</style>
