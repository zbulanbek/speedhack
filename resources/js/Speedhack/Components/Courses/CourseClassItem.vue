<template>
    <div class="program-item" :class="{'column': column}">
        <div class="header-class">
            <div class="percent-arr">
                <span>{{ item.percent }}</span>
                <img src="/images/icons/robbik.svg" class="img-arr">
            </div>
            <div class="title-wrap">
                <div class="title" v-html="item.title"></div> 
                <div class="percent">
                    {{ item.percent }}
                </div>
            </div>
            <div class="img">
                <img src="/images/icons/curb.svg">
            </div>
        </div>
        <div class="footer-class">
            <div class="title-wrap">
                <div class="old-price" :class="{'opacity': !item.sale}">
                     {{ item.sale }}₸
                </div>
                <p class="new-price">
                    {{ item.price }}₸
                </p>
                <p class="lesson-price" v-if="item.class_price" :class="{'mt': item.sale_lesson}">
                    ({{ item.class_price }}₸ за урок)
                    <b v-if="item.sale_lesson">{{item.sale_lesson}}</b>
                </p>
            </div>
            <div class="description" v-html="item.text"></div>

            <div class="img-col">
                <img src="/images/icons/curb.svg">
            </div>
        </div>
        
       <a class="btn-main" v-on:click="buyCourse" v-if="show">Купить курс</a>
       
    </div>
</template>
<script>
export default {
    name: 'CourseClassItem',
    props: {
        column: Boolean,
        item: Object,
        show:{
            type: Boolean,
            default: true
        },
    },
    data() {
        return {
           // column: true
        }
    },
    methods: {
        async buyCourse() {
            try {
                console.log('buyCourse');
                const {data} = await window.axios.post(route('account.catalog.courses.classes.buy', this.item.id));
                if (data.location) {
                    window.open(data.location, '_blank');
                    //window.location = data.location;
                }
            } catch (e) {
                //
            }
        }
    },

}
</script>
<style scoped>
.program-item{
    background: #fff;
    display: flex;
    flex-direction: column;
    padding: 16px;
    box-shadow: 0px 1px 4px rgba(0, 0, 0, 0.25);
    margin-bottom: 32px;
    border-radius: 10px;
    position: relative;
    height:calc(100% - 32px);
    min-height: 300px;
}

.percent-arr{
    display: none;
}

.header-class{
    width: 100%;
    display: flex;
    align-items: flex-start;
    margin-bottom: 8px;
}

.header-class .title-wrap{
    width: calc(60% - 10px);
    margin-right: 10px;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
}

.header-class .img{
    width: 40%;
    display: flex;
    align-items: flex-end;
    height: 120px;
}

.header-class .img img{
    width: 100%;
    height: 100%;
    object-fit: contain;
}

.footer-class{
    width: 100%;
    display: flex;
   
    margin-bottom: 16px;
    background: transparent;
    color: #000;
}

.footer-class .title-wrap{
    width: 40%;
    display: flex;
    flex-direction: column;

}
.footer-class .title-wrap .description{
    width: 60%;
    display: flex;
    flex-direction: column;
    align-items: flex-end;
}

.title{
    font-family: Inter;
    font-size: 16px;
    line-height: 17px;
    color: #000000;
    margin-bottom: 10px;
}
.title b{
    font-weight: bold;
    font-size: 36px;
    line-height: 28px;
}
.percent{
    font-family: Inter;
    font-weight: bold;
    font-size: 29px;
    line-height: 36px;
    color: #003ECB;
}

.old-price{
    font-family: Inter;
    font-size: 22px;
    line-height: 28px;
    color: #8B8B8B;
    position: relative;
    margin-bottom: 8px;
    width: fit-content;
}
.old-price.opacity{
    opacity: 0;
}
.old-price:before{
    content: "";
    display: block;
    width: 100%;
    height: 2px;
    left: 0px;
    top: 50%;
    transform: translate(-50%, -50%);
    position: absolute;
    background: #E42424;
    transform: rotate(-5deg);
    z-index: 1;
    overflow: hidden;
}

.new-price{
    font-family: Inter;
    font-weight: bold;
    font-size: 28px;
    line-height: 28px;
    color: #000000;
    margin-bottom: 15px;
}

.lesson-price{
    font-family: Inter;
    font-size: 14px;
    line-height: 18px;
    color: #000000;
    position: relative;
}
.lesson-price.mt{
    margin-top: 2px;
}
.lesson-price b{
    position: absolute;
    top: -15px;
    font-size: 11px;
    line-height: 13px;
    background: #FF2000;
    border-radius: 21px;
    color: #fff;
    padding: 2px 4px;
}
.description{
    display: flex;
    flex-direction: column;
    padding-top: 16px;
    width: calc(60% - 16px);
    margin-left: 16px;
}

.img-col{
    display: none;
    width: 40%;
    height: 120px;
}

.img-col img{
    width: 100%;
    height: 100%;
    object-fit: contain;
}

.description p{
    font-family: Inter;
    font-size: 18px;
    line-height: 28px;
    color: #030303;
    display: flex;
    align-items: center;
    margin-bottom: 6px;
}

.description p:after{
    content: url('/images/icons/star.svg');
    display: block;
    margin-right: 8px;
}

.btn-main{
    background: #F2994A;
    border-radius: 10px;
    width: 100%;
    padding: 11px;
    font-size: 16px;
    margin-top: auto;
}

.program-item.column .header-class .img{
    display: none;
}

.program-item.column .header-class .title-wrap{
    width: 100%;
    margin: 0px;
    align-items: center;
    justify-content: center;
}

.program-item.column{
    padding-top: 0px;
}
.program-item.column .title{
    text-align: center;
}

.program-item.column .percent{
    display: none;
}

.program-item.column .footer-class{
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.program-item.column .footer-class .title-wrap{
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.program-item.column .footer-class .description{
    width: 100%;
    margin: 0px;
}

.program-item.column .img-col{
    display: block;
}

.program-item.column .percent-arr{
    display: block;
    width: 100%;
    position: relative;
    height: 70px;
    text-align: center;
    padding-top: 4px;

}
.program-item.column .percent-arr span{
    z-index: 2;
    position: relative;
    font-family: Inter;
    font-weight: bold;
    font-size: 21px;
    line-height: 26px;
    letter-spacing: -0.01em;
    color: #FFFFFF;
    margin-top: 8px;
}
   
.program-item.column .header-class{
    flex-direction: column;
    align-items: center;  
}
   
.program-item.column .percent-arr .img-arr{
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    top: 0;
    width: 140px;
}
.program-item.column .btn-main{
   border-radius: 5px; 
}

@media only screen and (max-width:  768px) {
   .footer-class{
    flex-direction: column;
   }

   .footer-class .title-wrap{
        width: 100%;

   }

   .footer-class .description{
    width: 100%;
   }
   
}
</style>
