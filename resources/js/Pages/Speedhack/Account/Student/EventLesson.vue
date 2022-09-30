<template>
	<account-layout>
    	<section class="bg-account">
    		<div class="account-title">
	          <img src="/images/icons/arrow-left-blue.svg"><span>Разговорные клубы</span>
	        </div>

    		<div class="event-item">
    			<span class="title">
		            SpeedHack online club
		        </span>

    			<div class="video"></div>
    			<p>Ожидайте свое время. Это текст о компании. Он необходим для дальнейшего продвижения Вашего дальнейшего сайта. Вам будет <b>необходимо предоставить исходные</b> данные, по которым наши копирайтеры составят правильный текст.</p>
    		</div>
    	</section>
    </account-layout>
</template>
<script>

</script>
<style scoped>
	.bg-account{
		background: #F5F7F8;
		width: 100%;
    	height: 100%;
    }
	.account-title{
	    font-family: "Inter-Bold", sans-serif;
	    padding: 30px 20px;
	    font-weight: 600;
	    color: #050A1C;
	    font-size: 24px;
	    border-bottom: 1px solid #E0E3EB;
  	}
  	.account-title img{
    	margin-right: 16px;
  	}

  	.event-item .title{
	    font-family: "Inter-Bold", sans-serif;
	    color: #F2994A;
	    font-size: 40px;
	    margin-bottom: 20px;
	}

	.event-item{
	    padding: 30px;
	    background: #FFFFFF;
	    box-shadow: 0px 4px 16px rgba(110, 120, 130, 0.12);
	    border-radius: 8px;
	    display: flex;
	    flex-direction: column;
	    align-items: center;
	    justify-content: center;
	    margin: 40px 40px 40px;
	}
  	p{
	    font-size: 18px;
	    line-height: 22px;
	    text-align: center;
	    color: #212121;
	    margin-bottom: 40px;
	    margin: 0px 70px;
	    margin-top: 40px;
	    font-family: "Inter", sans-serif;
  	}
   	p b{
     font-family: "Inter-Bold", sans-serif;
   	}

   	.video{
   		width: 90%;
   		background-color: #003ECB;
   		height: 400px;
   		border-radius: 10px;
   		overflow: hidden;
   	}

</style>
