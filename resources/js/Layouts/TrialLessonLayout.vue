<template>
	<section class="account-wrap">
<!--        <template v-if="$page.props.user.role_id !== '2'">-->
<!--            <header-trial-lesson @toggleClass="toggleClassAside()" :activeClass="activeClass"></header-trial-lesson>-->
<!--        </template>-->

<!--        <div class="wrap-content">-->
<!--            <template v-if="$page.props.user.role_id !== '2'">-->
<!--                <aside-metodist :activeClass="activeClass"></aside-metodist>-->
<!--            </template>-->
<!--            <section class="content-wrap" :class="{'active': activeClass, 'full': $page.props.user.role_id === 2}">-->
<!--                <slot></slot>-->
<!--            </section>-->
<!--        </div>-->
        <slot></slot>
    </section>
</template>
<script>
	import HeaderTrialLesson from '@/Speedhack/Components/Account/HeaderTrialLesson';
	import AsideMetodist from '@/Speedhack/Components/Account/AsideMetodist';

	export default {
    components: {
        HeaderTrialLesson,
        AsideMetodist
    },
    data() {
        return {
           activeClass: true,
           windowWidth: window.innerWidth
        }
    },
    mounted() {
        window.addEventListener('resize', () => {
          this.windowWidth = window.innerWidth
        });
        this.activeClass = true;

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
    .content-wrap.full{
        width: 100%;
        height: 100%;
        padding-bottom: 200px;
        background: #F5F7F8;

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
