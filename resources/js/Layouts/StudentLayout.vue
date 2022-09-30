<template>
    <section class="account-wrap">
        <header-student @toggleClass="toggleClassAside()" ></header-student>
        <div class="wrap-content">
            <aside-student :activeClass="activeClass"></aside-student>
            <section class="content-wrap" :class="{'active': activeClass}">
                <slot></slot>
            </section>
        </div>
        <footer-main></footer-main>
    </section>
</template>

<script>
import FooterMain from '@/Speedhack/Components/Details/Footer';
import HeaderStudent from '@/Speedhack/Components/Account/HeaderStudent';
import AsideStudent from '@/Speedhack/Components/Account/AsideStudent';

export default {
    components: {
        FooterMain,
        HeaderStudent,
        AsideStudent
    },
    data() {
        return {
           activeClass: false,
           windowWidth: window.innerWidth
        }
    },
    mounted() {
        window.addEventListener('resize', () => {
          this.windowWidth = window.innerWidth
        });
        if(this.isMobile){
            this.activeClass = true;
        }else{
            this.activeClass = false;
        }
    },
    computed: {
        isMobile() {
            if(this.windowWidth <= 1166){
                this.activeClass = true;
                return true;
            }else{
                this.activeClass = false;
                return false;
            }
        }
    },
    methods: {
        toggleClassAside(){
            this.activeClass = !this.activeClass;
        }
    },
}
</script>
<style scoped>
    .wrap-content{
        display: flex;
        overflow: hidden;
    }
    .content-wrap{
        width: calc(100% - 300px);
    }

    .content-wrap.active{
        width: calc(100% - 100px);
    }

    @media only screen and (max-width: 768px) {
        .wrap-content{
            position: relative;
        }
        .content-wrap{
            width: 100%;
        }

        .content-wrap.active{
            width: 100%;
        }
    }
</style>
