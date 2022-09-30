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
          <small>До начала</small>
          <time-count deadline="2021-02-10 00:00:00"></time-count>
          <p>Ожидайте свое время. Это текст о компании. Он необходим для дальнейшего продвижения Вашего дальнейшего сайта. Вам будет <b>необходимо предоставить исходные</b> данные, по которым наши копирайтеры составят правильный текст.</p>

          <a href="" class="btn-main">Вернуться назад</a>
        </div>
      </section>
    </account-layout>
</template>
<script>
  import TimeCount from '@/Speedhack/Components/Account/TimeCount';

  export default {
      components: {
        TimeCount
      },
      data() {
          return {

            }
      },
  }
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
  .event-item{
    padding: 40px;
    background: #FFFFFF;
    box-shadow: 0px 4px 16px rgba(110, 120, 130, 0.12);
    border-radius: 8px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    margin: 40px 60px 60px;
  }
  .event-item .title{
    font-family: "Inter-Bold", sans-serif;
    color: #F2994A;
    font-size: 40px;
    margin-bottom: 20px;
  }
  small{
    font-family: "Inter-Bold", sans-serif;
    font-size: 24px;
    color: #050A1C;
    text-align: center;
    text-transform: uppercase;
    margin-bottom: 25px;
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
   .btn-main{
    padding: 12px 60px;
    font-size: 18px;
    margin-top: 40px;
   }

   @media only screen and (max-width: 768px) {
      .event-item .title{
        text-align: center;
        font-size: 32px;
      }
      .event-item{
        margin: 60px 10px;
      }
      p{
        margin: 0px;
      }
      .flip-clock{
        margin-bottom: 60px;
      }
   }
</style>
