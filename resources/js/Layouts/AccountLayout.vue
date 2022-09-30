<template>
	<section class="account-wrap">
        <header-student @toggleClass="toggleClassAside()" ></header-student>
        <div class="wrap-content">
            <component :is="asideComponent" :activeClass="activeClass"></component>
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
	import AsideMetodist from '@/Speedhack/Components/Account/AsideMetodist';
    import AsideTeacher from "@/Speedhack/Components/Account/AsideTeacher";
    import AsideStudent from "@/Speedhack/Components/Account/AsideStudent";
    import AsideAdmin from "@/Speedhack/Components/Account/AsideAdmin";

	export default {
    components: {
        FooterMain,
        HeaderStudent,
        AsideMetodist,
        AsideTeacher,
        AsideStudent,
        AsideAdmin
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

        if (this.isMobile){
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
        },
        asideComponent() {
            console.log("$page.props.user: " + this.$page.props.user);
            let role_id = null;
            if(this.$page.props.user){
                role_id = this.$page.props.user.role_id;
            }
            role_id = role_id ? role_id : null;

            if (role_id === '3') {
                return 'aside-teacher'
            } else if (role_id === '4') {
                return 'aside-metodist'
            } else if (role_id === '1') {
                return 'aside-admin'
            } 
            else {
                return 'aside-student'
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
            max-height: 100%;
            height: 934px;
        }

        .content-wrap.active{
            width: 100%;
            max-height: 100%;
            height: auto;
        }
    }
</style>
